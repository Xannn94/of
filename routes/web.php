<?php
use App\Modules\Tree\Facades\Tree;

try {
    Route::localizedGroup(function () {
        Route::group(['middleware' => ['page','meta']], function () {
            foreach (Tree::getRoutes() as $route) {
                if (!$route->module) {
                    Route::get($route->url, '\App\Modules\Tree\Http\Controllers\IndexController@index')->name($route->slug);
                } else {
                    $module = ucfirst($route->module);

                    Route::get($route->url, '\App\Modules\\' . $module . '\Http\Controllers\IndexController@index')->name($route->slug);
                    Route::get($route->url . '/{id}', '\App\Modules\\' . $module . '\Http\Controllers\IndexController@show')->name($route->slug . '.show');
                }
            }
        });
    });
}
catch (PDOException $e){

}