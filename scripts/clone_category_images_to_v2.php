<?php

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\category;
use Illuminate\Support\Facades\Storage;

$disk = Storage::disk('do_spaces');
$rows = category::query()
    ->whereNotNull('image')
    ->where('image', '!=', '')
    ->get(['id', 'image']);

$map = [];
$missing = [];
$copied = 0;
$updated = 0;
$skipped = 0;

foreach ($rows as $row) {
    $oldValue = trim((string) $row->image);
    if ($oldValue === '') {
        $skipped++;
        continue;
    }

    $oldFile = basename($oldValue);
    $oldNameOnly = pathinfo($oldFile, PATHINFO_FILENAME);
    if (preg_match('/_v2(_\d+)?$/', $oldNameOnly)) {
        $skipped++;
        continue;
    }

    if (isset($map[$oldValue])) {
        if ($row->image !== $map[$oldValue]) {
            $row->image = $map[$oldValue];
            $row->save();
            $updated++;
        }
        continue;
    }

    $oldKey = 'game/category/'.$oldFile;
    if (!$disk->exists($oldKey)) {
        $missing[] = ['id' => $row->id, 'key' => $oldKey];
        $skipped++;
        continue;
    }

    $ext = pathinfo($oldFile, PATHINFO_EXTENSION);
    $suffix = '_v2';
    $newFile = $oldNameOnly.$suffix.($ext !== '' ? '.'.$ext : '');
    $newKey = 'game/category/'.$newFile;
    $i = 2;

    while ($disk->exists($newKey)) {
        $newFile = $oldNameOnly.$suffix.'_'.$i.($ext !== '' ? '.'.$ext : '');
        $newKey = 'game/category/'.$newFile;
        $i++;
    }

    if ($disk->copy($oldKey, $newKey)) {
        $copied++;
        $map[$oldValue] = $newFile;
        if ($row->image !== $newFile) {
            $row->image = $newFile;
            $row->save();
            $updated++;
        }
    } else {
        $missing[] = ['id' => $row->id, 'key' => $oldKey, 'error' => 'copy_failed'];
        $skipped++;
    }
}

echo 'Total categories: '.$rows->count().PHP_EOL;
echo 'Copied files: '.$copied.PHP_EOL;
echo 'Updated rows: '.$updated.PHP_EOL;
echo 'Skipped: '.$skipped.PHP_EOL;

if (!empty($missing)) {
    echo 'Missing/copy-failed entries (first 20):'.PHP_EOL;
    foreach (array_slice($missing, 0, 20) as $m) {
        echo '- category_id='.$m['id'].' key='.$m['key'].(isset($m['error']) ? ' error='.$m['error'] : '').PHP_EOL;
    }
}

