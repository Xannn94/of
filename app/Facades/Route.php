<?php
namespace App\Facades;

class Route extends \Illuminate\Support\Facades\Route{

    public static function getAction(){
        $parentRoute = parent::getCurrentRoute();

        if (!$parentRoute){
            return false;
        }

        $action = explode('@', $parentRoute->getActionName());

        if (!isset($action[1])){
            return false;
        }

        return $action[1];
    }

    public static function getModule(){
        $parentRoute = parent::getCurrentRoute();

        if (!$parentRoute){
            return false;
        }

        $action = $parentRoute->getActionName();

        preg_match('!App\\\Modules\\\(.*)\\\!isU', $action, $res);

        if (isset($res[1])){
            return strtolower($res[1]);
        }

        return false;
    }
}