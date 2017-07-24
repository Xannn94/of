<?php

namespace App\Modules\Regions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Regions\Models\Regions;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Regions;
    }
}