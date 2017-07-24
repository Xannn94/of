<?php

namespace App\Modules\Articles\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Articles\Models\Article;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Article();
    }


}