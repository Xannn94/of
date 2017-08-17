<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Products;

class IndexController extends Controller
{


    public function getModel()
    {
        return new Products;
    }


}