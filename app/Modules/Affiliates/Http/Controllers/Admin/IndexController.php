<?php

namespace App\Modules\Affiliates\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Affiliates\Models\Affiliates;
use App\Modules\Admin\Http\Controllers\Priority;

class IndexController extends Admin
{
    use Priority;

    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'affiliates';

    public function getModel()
    {
        return new Affiliates();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];
    }
}
