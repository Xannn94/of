<?php

namespace App\Modules\Gallery\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Gallery\Models\Gallery;

class IndexController extends Admin
{
    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'gallery';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'modules';

    public function getModel()
    {
        return new Gallery();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];
    }
}
