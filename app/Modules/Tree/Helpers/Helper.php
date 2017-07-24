<?php
namespace App\Modules\Tree\Helpers;

use Xannn94\Modules\Facades\Module;

class Helper{

    public static function getModulesSelect($all = false){
        $modules = Module::all();
        return $modules;
    }
}