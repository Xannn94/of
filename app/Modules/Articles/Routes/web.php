<?php
Route::localizedGroup(function () {

    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('articles', 'Admin\IndexController');
        Route::put('articles/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.articles.priority');
        Route::delete('articles/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')->name('admin.articles.delete-upload');
    });
});