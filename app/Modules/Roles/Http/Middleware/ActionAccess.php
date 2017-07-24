<?php

namespace App\Modules\Roles\Http\Middleware;

use App\Facades\Route;
use App\Modules\Roles\Models\Modules;
use Closure;
use Illuminate\Support\Facades\Auth;

class ActionAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        $module = Route::getModule();

        if ($module != 'admin'){
            switch (action()){
                case 'index':
                    $moduleId   = Modules::where('slug',$module)->first()->id;
                    $permission = Auth::guard('admin')
                        ->user()
                        ->role
                        ->permissions()
                        ->where('permissions.module_id',$moduleId)
                        ->first();

                    if (!$permission->read){
                        return redirect()->back()->with(['message' => trans('roles::admin.access.denied')]);
                    }
                    break;
                case 'create':
                    $moduleId   = Modules::where('slug',$module)->first()->id;
                    $permission = Auth::guard('admin')
                        ->user()
                        ->role
                        ->permissions()
                        ->where('permissions.module_id',$moduleId)
                        ->first();

                    if (!$permission->create){
                        return redirect()->back()->with(['message' => trans('roles::admin.access.denied')]);
                    }
                    break;
                default:
                    break;
            }
        }

        return $next($request);
    }
}
