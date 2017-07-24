<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\ViewComposers\MenuComposer;
use Illuminate\View\View;

class HomeController extends Controller
{
    public $page        = 'index';
    public $pageGroup   = 'index';

    public function index()
    {
        return view('admin::home');
    }

    public function test()
    {
        dd('TEST!!!');
    }
}
