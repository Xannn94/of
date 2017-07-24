<?php
Route::localizedGroup(function () {

    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('news', 'Admin\IndexController');
        Route::delete('news/delete-upload/{id}/{field}', 'Admin\IndexController@deleteUpload')
            ->name('admin.news.delete-upload');
    });
});