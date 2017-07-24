<?php

namespace App\Modules\Regions\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Regions\Models\Regions;
use App\Modules\Admin\Http\Controllers\Priority;

class IndexController extends Admin
{
    use Priority;

    public function getModel()
    {
        return new Regions();
    }

    public function getRules($request, $id = false)
    {
        return  [
            'title' => 'sometimes|required|max:255'
        ];
    }
}
