<?php
Route::localizedGroup(function () {

    Route::group(['prefix' => config('cms.uri')], function() {
        Route::resource('affiliates', 'Admin\IndexController');
        Route::put('affiliates/priority/{id}/{direction}', 'Admin\IndexController@priority')->name('admin.affiliates.priority');
    });

    Route::get('affiliates/','IndexController@index')->name('affiliates')->middleware(['page']);
    Route::get('affiliates/big-map','IndexController@bigMap')->name('affiliates.big-map')->middleware(['page']);
    Route::get('affiliates/map/{id}','IndexController@map')->name('affiliates.map');

});