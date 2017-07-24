<?php


Route::localizedGroup(function () {
    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('widgets', 'Admin\IndexController');
    });
});
