<?php

namespace App\Http\Middleware;

use Closure;
use App\Modules\Tree\Helpers\Breadcrumbs as Facade;

class Breadcrumbs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $renderEntity = true)
    {
        $page = $request->get('page');

        if ($page) {
            $ancestors = $page->ancestorsAndSelf()->get();

            foreach ($ancestors as $ancestor) {
                if ($ancestor->slug) {
                    $url = route($ancestor->slug);
                } else {
                    $url = home();
                }

                Facade::add($ancestor->title, $url);
            }
        }

        $entity = $request->get('entity');

        if ($entity && $renderEntity===true) {
            Facade::add($entity->title, route($page->slug . '.show', ['id' => $entity->id]));
        }

        return $next($request);
    }
}
