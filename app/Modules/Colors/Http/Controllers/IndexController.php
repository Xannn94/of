<?php

namespace App\Modules\Colors\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Colors\Models\Colors;

class IndexController extends Controller
{


    public function getModel()
    {
        return new Colors;
    }


}