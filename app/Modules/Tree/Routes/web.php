<?php
Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('tree', 'Admin\IndexController');
        Route::put('tree/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.tree.priority');
    });
});
