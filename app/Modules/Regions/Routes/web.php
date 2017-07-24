<?php
Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('regions', 'Admin\IndexController');
        Route::put('regions/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.regions.priority');
    });
});