<?php

namespace App\Modules\Widgets\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Widgets\Models\Widget;

class IndexController extends Admin
{
    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'widgets';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'content';

    public function getModel()
    {
        return new Widget();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];
    }
}
