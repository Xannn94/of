<?php
namespace App\Modules\Gallery\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Gallery\Models\Gallery;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Gallery();
    }
}