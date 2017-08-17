<?php

namespace App\Modules\Colors\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Colors\Models\Colors;


class IndexController extends Admin
{
    public function getModel(){
        return new Colors();
    }

    public function getRules($request, $id = false)
    {
        return  [];

    }





}
