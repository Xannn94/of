<?php
namespace App\Modules\Sliders\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Sliders\Models\Sliders;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Sliders();
    }
}