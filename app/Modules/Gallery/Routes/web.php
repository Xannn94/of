<?php

Route::group(['prefix' => 'admin'], function() {
    Route::resource('gallery', 'Admin\IndexController');
    Route::put('gallery/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.gallery.priority');
    Route::resource('gallery.images', 'Admin\ImagesController');
});
