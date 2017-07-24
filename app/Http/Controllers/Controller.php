<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController
{
    public $perPage = 10;

    protected $viewPrefix = '';
    protected $routePrefix = '';

    public $breadcrumbs = true;
    public $og = true;
    public $meta = true;

    abstract public function getModel();

    public function __construct()
    {
        $this->setRoutePrefix();
        $this->setViewPrefix();

        $this->fetchEntity();
        $this->setMiddleware();

    }

    protected function fetchEntity()
    {
        $id = Request::getFacadeRoot()->id;
        if (action() == 'show' && $id){
            $entity = $this->getModel()->findOrFail($id);
            Request::getFacadeRoot()->attributes->add(['entity' => $entity]);
            View::share('entity', $entity);
        }
    }

    protected function setMiddleware()
    {
        $this->middleware('breadcrumbs');

        //Если не надо автоматически выводить последнюю крампу
        //$this->middleware('breadcrumbs:false');
        $this->middleware('og');
        $this->middleware('meta');

    }

    protected function setRoutePrefix()
    {
        if (module() && !$this->routePrefix){
            $this->routePrefix = module().'.';
        }
    }

    protected function setViewPrefix()
    {
        if (module() && !$this->viewPrefix){
            $this->viewPrefix = module().'::';
        }
    }

    public function getShowViewName(){
        return $this->viewPrefix.'show';
    }

    public function getIndexViewName(){
        return $this->viewPrefix.'index';
    }

    public function index(){
        return view($this->getIndexViewName(), [
            'items'=>$this->getModel()->active()->paginate($this->perPage),
            'routePrefix'=>$this->routePrefix
        ]);
    }

    public function show($id){
        return view($this->getShowViewName(), ['routePrefix'=>$this->routePrefix]);
    }
}
