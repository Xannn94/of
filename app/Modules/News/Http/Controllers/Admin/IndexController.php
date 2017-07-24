<?php

namespace App\Modules\News\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\News\Models\News;


class IndexController extends Admin
{
    use Image;

    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'news';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'modules';

    public function getModel()
    {
        return new News();
    }

    public function getRules($request, $id = false)
    {
        return  [
            'title' => 'sometimes|required|max:255'
        ];
    }
}
