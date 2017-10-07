<?php

namespace App\Modules\Collections\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Collections\Models\Collections;
use Illuminate\Validation\Rule;


class IndexController extends Admin
{
    use Image, Priority;

    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'collections';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'modules';

    public function getModel(){
        return new Collections();
    }

    public function getRules($request, $id = false)
    {
        return  [
            'title' => 'sometimes|required|max:255',
            'slug'  => [
                'sometimes', 'required', 'regex:/(^[A-Za-z0-9_\-]+$)+/', 'max:60',
                Rule::unique('tree')->ignore($id)->where('lang', lang())
            ]
        ];
    }
}
