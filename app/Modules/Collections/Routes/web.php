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
        Route::resource('collections', 'Admin\IndexController');
        Route::delete('collections/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')
            ->name('admin.collections.delete-upload');

        Route::put('collections/priority/{id}/{direction}', 'Admin\IndexController@priority')
            ->name('admin.collections.priority');
    });

});
