<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $id = 1;
        $objs = setting::find($id);
        if (!$objs) {
            $objs = new setting();
        }
        $data['objs'] = $objs;

        return view('admin.setting.index', $data);
    }

    public function post_setting(Request $request)
    {
        $id = 1;
        $objs = setting::find($id);

        if (!$objs) {
            $objs = new setting();
            $objs->id = $id;
        }

        $facebookImage = $request->file('facebook_image');
        $bannerImage = $request->file('banner_his');
        $siteLogo = $request->file('site_logo');
        $faviconImage = $request->file('favicon_image');

        if ($bannerImage) {
            if ($objs->banner_his && str_contains($objs->banner_his, '/')) {
                Storage::disk('do_spaces')->delete($objs->banner_his);
            }
            $filename2 = 'setting/banner/'.$bannerImage->hashName();
            Storage::disk('do_spaces')->put($filename2, file_get_contents($bannerImage->getRealPath()), 'public');
            $objs->banner_his = $filename2;
        }

        if ($facebookImage) {
            if ($objs->facebook_image && str_contains($objs->facebook_image, '/')) {
                Storage::disk('do_spaces')->delete($objs->facebook_image);
            }
            $filename = 'setting/og/'.$facebookImage->hashName();
            Storage::disk('do_spaces')->put($filename, file_get_contents($facebookImage->getRealPath()), 'public');
            $objs->facebook_image = $filename;
        }

        if ($siteLogo) {
            if ($objs->site_logo && str_contains($objs->site_logo, '/')) {
                Storage::disk('do_spaces')->delete($objs->site_logo);
            }
            $logoFilename = 'setting/logo/'.$siteLogo->hashName();
            Storage::disk('do_spaces')->put($logoFilename, file_get_contents($siteLogo->getRealPath()), 'public');
            $objs->site_logo = $logoFilename;
        }

        if ($faviconImage) {
            if ($objs->favicon_image && str_contains($objs->favicon_image, '/')) {
                Storage::disk('do_spaces')->delete($objs->favicon_image);
            }
            $faviconFilename = 'setting/favicon/'.$faviconImage->hashName();
            Storage::disk('do_spaces')->put($faviconFilename, file_get_contents($faviconImage->getRealPath()), 'public');
            $objs->favicon_image = $faviconFilename;
        }

        $objs->name_website = $request['name_website'];
        $objs->facebook_title = $request['facebook_title'];
        $objs->facebook_detail = $request['facebook_detail'];
        $objs->line_oa = $request['line_oa'];
        $objs->line_oa_url = $request['line_oa_url'];
        $objs->phone = $request['phone'];
        $objs->email = $request['email'];
        $objs->google_analytic = $request['google_analytic'];
        $objs->og_url = $request['og_url'];
        $objs->facebook_url = $request['og_url'];
        $objs->meta_author = $request['meta_author'];
        $objs->meta_keywords = $request['meta_keywords'];
        $objs->save();

        return redirect(url('admin/setting/'))->with('edit_success', 'Settings updated successfully.');
    }
}
