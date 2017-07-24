<?php

namespace App\Modules\Admin\Http\Controllers;

class ImagesController extends Controller
{
    public $page = 'images';
    public $pageGroup = 'content';

    public function images(){
        return view('admin::files.images');
    }

}
