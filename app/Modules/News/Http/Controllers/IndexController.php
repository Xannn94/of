<?php

namespace App\Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;

class IndexController extends Controller
{
    public function getModel()
    {
        return new News;
    }
}