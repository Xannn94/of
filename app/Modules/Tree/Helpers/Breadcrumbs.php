<?php
namespace App\Modules\Tree\Helpers;

class Breadcrumbs{

    private static $crumbs = [];

    public static function add($title, $url){
        $arr = [
            'title' => $title,
            'url'   => $url, 'last'=>true
        ];
        self::resetLast();
        self::$crumbs[] = (object)$arr;
    }

    protected static function resetLast(){
        foreach (self::$crumbs as &$crumb){
            $crumb->last = false;
        }
    }

    public static function all(){
        return self::$crumbs;
    }
}