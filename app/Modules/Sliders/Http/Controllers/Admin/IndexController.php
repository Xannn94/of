<?php
namespace App\Modules\Sliders\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Sliders\Models\Sliders;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;

class IndexController extends Admin
{
    use Image, Priority;

    public function getModel()
    {
        return new Sliders();
    }

    public function getRules($request, $id = false)
    {
        return  [];
    }
}