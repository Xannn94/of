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

Route::localizedGroup(function (){
    Route::get('robots.txt','IndexController@robots');

    Route::get('sitemap.xml','IndexController@index');
    Route::get('sitemap/{mod}_{offset}.xml','IndexController@mod')->where(['mod' => '(.*)','offset' => '(\d)']);
});

