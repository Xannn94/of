<?php

Route::group(['prefix' => config('cms.uri')], function() {
    Route::get('/', 'HomeController@index');

    Route::get('files/images', 'ImagesController@images')->name('admin.files.images');
    Route::get('files/files', 'FilesController@files')->name('admin.files.files');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
});
