<?php

use App\Models\setting;

function get_site_setting()
{
    static $cached = null;

    if ($cached === null) {
        $cached = setting::find(1);
    }

    return $cached;
}

function get_site_setting_value($key, $default = '')
{
    $settings = get_site_setting();

    if (!$settings) {
        return $default;
    }

    $value = $settings->{$key} ?? null;

    return ($value !== null && $value !== '') ? $value : $default;
}

function get_site_title()
{
    return get_site_setting_value('name_website', config('app.name', 'Laravel'));
}

function get_title_facebook()
{
    return get_site_setting_value('facebook_title', get_site_title());
}

function get_facebook_detail()
{
    return get_site_setting_value('facebook_detail', '');
}

function get_line_url()
{
    return get_site_setting_value('line_oa_url', '#');
}

function get_banner_img()
{
    return get_site_setting_value('banner_his', '');
}

function get_spaces_proxy_url($path)
{
    return url('images/'.ltrim($path, '/'));
}

function get_setting_image_url($value, $legacyLocalDir, $fallbackUrl)
{
    if (!$value) {
        return $fallbackUrl;
    }

    if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
        return $value;
    }

    if (str_contains($value, '/')) {
        return get_spaces_proxy_url($value);
    }

    return url(trim($legacyLocalDir, '/').'/'.$value);
}

function get_banner_img_url()
{
    $value = get_banner_img();
    if (!$value) {
        return url('img/favicon-32x32.png');
    }

    if (str_contains($value, '/')) {
        return get_spaces_proxy_url($value);
    }

    return url('media/'.$value);
}

function get_banner_url()
{
    return get_site_setting_value('google_analytic', '#');
}

function get_facebook_img()
{
    $image = get_site_setting_value('facebook_image', '');
    return get_setting_image_url(
        $image,
        'media',
        url('img/favicon-32x32.png')
    );
}

function get_site_logo()
{
    $logo = get_site_setting_value('site_logo', '');
    return get_setting_image_url(
        $logo,
        'media',
        url('/home/assets/img/LOGO.png')
    );
}

function get_favicon_img()
{
    $favicon = get_site_setting_value('favicon_image', '');
    return get_setting_image_url(
        $favicon,
        'media',
        url('img/favicon-32x32.png')
    );
}

function get_meta_author()
{
    return get_site_setting_value('meta_author', get_site_setting_value('facebook', get_site_title()));
}

function get_meta_keywords()
{
    return get_site_setting_value('meta_keywords', '');
}

function get_og_url()
{
    return get_site_setting_value('og_url', get_site_setting_value('facebook_url', config('app.url')));
}

function get_user_online()
{
    return number_format((int) get_site_setting_value('twitter', 0));
}

function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate));
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear ";
}
