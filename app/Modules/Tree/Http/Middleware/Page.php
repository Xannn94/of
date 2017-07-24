<?php

namespace App\Modules\Tree\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Modules\Tree\Facades\Tree;
use Illuminate\Support\Facades\View;

class Page
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $route  = Route::currentRouteName();
        $page   = false;

        if ($route) {
            if (strstr($route, '.')) {
                $route = explode('.', $route)[0];
            }
            $page = Tree::get($route);
        }

        //Главная страница
        if (!$page) {
            $page = Tree::getRoot();
        }


        if ($page) {
            $request->attributes->add(['page' => $page]);
            View::share('page', $page);

        }

        return $next($request);
    }
}
