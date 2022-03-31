<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

if (!function_exists('subho')) {
     function subho()
    {
        return 'subho';

    }
}

if (!function_exists('_lang')) {
    function _lang($string = '')
    {

        $action = app('request')->route()->getAction();
        // $controller = class_basename($action['controller']);
        $target_lang = '';

        // if (explode('@', $controller)[0] == 'WebsiteController') {
        //     $target_lang = session('language');
        // } else {
        //     $target_lang = get_lang();
        // }

        if ($target_lang == '') {
            $target_lang = "language";
        }

        if (file_exists(resource_path() . "/_lang/$target_lang.php")) {
            include(resource_path() . "/_lang/$target_lang.php");
        } else {
            include(resource_path() . "/_lang/language.php");
        }

        if (array_key_exists($string, $language)) {
            return $language[$string];
        } else {
            return $string;
        }
    }
}

if (!function_exists('get_lang')) {
    function get_lang($string = '')
    {
        $set_lang = Session::get('_lang');
        $default_lang = get_option('language');
        $lang = (($set_lang != '') ? $set_lang : $default_lang);
        return $lang;
    }
}

if (!function_exists('get_option')) {
    function get_option($name, $optional = '')
    {
        $setting = DB::table('generels')->where('name', $name)->get();
        if (!$setting->isEmpty()) {
            return $setting[0]->value;
        }
        return $optional;
    }
}

if (!function_exists('create_timezone_option')) {

    function create_timezone_option($old = "")
    {
        $option = "";
        $timestamp = time();
        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $selected = $old == $zone ? "selected" : "";
            $option .= '<option value="' . $zone . '"' . $selected . '>' . 'GMT ' . date('P', $timestamp) . ' ' . $zone . '</option>';
        }
        echo $option;
    }
}

if (!function_exists('get_logo')) {
    function get_logo()
    {
        $logo = get_option("logo");
        if ($logo == '') {
            return asset("/default/default-logo.png");
        }
        return asset("/default/default-logo.png");
    }
}

if (!function_exists('get_icon')) {
    function get_icon()
    {
        $icon = get_option("icon");

        if ($icon == '') {
            return asset("/default/default-icon.png");
        }
        return asset("/uploads/images/$icon");
    }
}