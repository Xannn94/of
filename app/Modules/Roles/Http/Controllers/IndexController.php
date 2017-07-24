<?php

namespace App\Modules\Roles\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Roles\Models\Roles;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Roles;
    }
}