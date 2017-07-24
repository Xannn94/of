<?php
use App\Facades\Route;


if (!function_exists('host')) {
    function host()
    {
        return sprintf(
            "%s://%s",
            host_protocol(),
            @$_SERVER['SERVER_NAME']

        );
    }
}

if (!function_exists('host_protocol')) {
    function host_protocol()
    {
        return
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
    }
}

if (!function_exists('lang')) {
    function lang()
    {
        return localization()->getCurrentLocale();
    }
}


if (!function_exists('widget')) {
    function widget($slug)
    {
        return \App\Modules\Widgets\Facades\Widget::get($slug);
    }
}


if (!function_exists('home')) {
    function home()
    {
        return localization()->getLocalizedURL(lang(), '/');
    }
}


if (!function_exists('module')) {
    function module()
    {
        return Route::getModule();
    }
}


if (!function_exists('module_config')) {
    function module_config($section = false, $module = false)
    {
        if (!$module) {
            $module = module();
        }

        if (!$module) {
            return false;
        }

        $str = 'modules.items.' . $module;

        if ($section) {
            $str .= '.' . $section;
        }

        return config($str);
    }
}


if (!function_exists('action')) {
    function action()
    {
        return Route::getAction();
    }
}

