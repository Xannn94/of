<?php

namespace App\Modules\Collections\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Collections\Models\Collections;

class IndexController extends Controller
{
    public $perPage = 4;

    public function getModel()
    {
        return new Collections;
    }

    public function index(){
        return view($this->getIndexViewName(), [
            'items'=>$this->getModel()->active()/*->with('products')*/->paginate($this->perPage),
            'routePrefix'=>$this->routePrefix
        ]);
    }
}