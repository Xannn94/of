<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::localizedGroup(function () {

    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('sliders', 'Admin\IndexController');

        Route::put('sliders/priority/{id}/{direction}', 'Admin\IndexController@priority')
            ->name('admin.sliders.priority');

        Route::delete('sliders/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')
            ->name('admin.sliders.delete-upload');
    });

});
