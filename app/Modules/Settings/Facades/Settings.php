<?php
namespace App\Modules\Settings\Facades;
use App\Modules\Settings\Models\Settings as Model;

class Settings{
    public static function get($key){
        return Model::where('key', $key)->pluck('value')->first();
    }
}