<?php
namespace App\Modules\Widgets\Facades;

use App\Modules\Widgets\Models\Widget as Model;

class Widget{
    public static function get($slug)
    {
        return Model::where('slug', $slug)->list()->pluck('content')->first();
    }
}