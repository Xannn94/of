<?php

namespace App\Modules\Collections\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Collections\Models\Collections;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Collections;
    }
}