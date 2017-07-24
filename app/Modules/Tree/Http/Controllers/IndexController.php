<?php

namespace App\Modules\Tree\Http\Controllers;

use Illuminate\Routing\Controller;

use App\Modules\Tree\Facades\Tree;
use Illuminate\Http\Request;


class IndexController extends Controller{

    public function __construct(){
        $this->middleware('breadcrumbs');
        $this->middleware('og');
        $this->middleware('meta');
    }

    public function index(Request $request){

        $page =  $request->get('page');

        //Главная страница
        if (!$page){
            $page = Tree::getRoot();
        }

        return view($page->template, ['page'=>$page]);
    }

}