<?php

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

$disk = Storage::disk('do_spaces');
$games = game::query()
    ->whereNotNull('game_image')
    ->where('game_image', '!=', '')
    ->get(['id', 'game_image']);

$map = [];
$missing = [];
$copied = 0;
$updated = 0;
$skipped = 0;

foreach ($games as $g) {
    $oldValue = trim((string) $g->game_image);
    if ($oldValue === '') {
        $skipped++;
        continue;
    }

    if (isset($map[$oldValue])) {
        if ($g->game_image !== $map[$oldValue]) {
            $g->game_image = $map[$oldValue];
            $g->save();
            $updated++;
        }
        continue;
    }

    $oldFile = basename($oldValue);
    $oldNameOnly = pathinfo($oldFile, PATHINFO_FILENAME);
    if (preg_match('/_v2(_\d+)?$/', $oldNameOnly)) {
        $skipped++;
        continue;
    }
    $oldKey = 'game/game/'.$oldFile;

    if (!$disk->exists($oldKey)) {
        $missing[] = ['id' => $g->id, 'key' => $oldKey];
        $skipped++;
        continue;
    }

    $name = $oldNameOnly;
    $ext = pathinfo($oldFile, PATHINFO_EXTENSION);
    $suffix = '_v2';
    $newFile = $name.$suffix.($ext !== '' ? '.'.$ext : '');
    $newKey = 'game/game/'.$newFile;
    $i = 2;

    while ($disk->exists($newKey)) {
        $newFile = $name.$suffix.'_'.$i.($ext !== '' ? '.'.$ext : '');
        $newKey = 'game/game/'.$newFile;
        $i++;
    }

    if ($disk->copy($oldKey, $newKey)) {
        $copied++;
        $map[$oldValue] = $newFile;
        if ($g->game_image !== $newFile) {
            $g->game_image = $newFile;
            $g->save();
            $updated++;
        }
    } else {
        $missing[] = ['id' => $g->id, 'key' => $oldKey, 'error' => 'copy_failed'];
        $skipped++;
    }
}

echo 'Total games: '.$games->count().PHP_EOL;
echo 'Copied files: '.$copied.PHP_EOL;
echo 'Updated rows: '.$updated.PHP_EOL;
echo 'Skipped: '.$skipped.PHP_EOL;

if (!empty($missing)) {
    echo 'Missing/copy-failed entries (first 20):'.PHP_EOL;
    foreach (array_slice($missing, 0, 20) as $m) {
        echo '- game_id='.$m['id'].' key='.$m['key'].(isset($m['error']) ? ' error='.$m['error'] : '').PHP_EOL;
    }
}
