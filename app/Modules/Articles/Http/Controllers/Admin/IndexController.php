<?php
namespace App\Modules\Articles\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Articles\Models\Article;

class IndexController extends Admin
{
    use Image, Priority;

    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'articles';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'modules';

    public function getModel()
    {
        return new Article();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];
    }
}
