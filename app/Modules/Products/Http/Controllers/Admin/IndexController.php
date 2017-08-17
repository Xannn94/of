<?php

namespace App\Modules\Products\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Products\Models\Products;


class IndexController extends Admin
{
    public function getModel(){
        return new Products();
    }

    public function getRules($request, $id = false)
    {
        return  [];

    }





}
