<?php


Route::group(['prefix' => config('cms.uri')], function() {

    Route::resource('users', 'Admin\IndexController');
});

/*Auth route*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register')->middleware(['breadcrumbs','page']);
Route::post('register', 'Auth\RegisterController@register')->name('user.register.post');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail')->name('user.confirm')->middleware(['breadcrumbs','page']);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login')->middleware(['breadcrumbs','page']);
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user.reset')->middleware(['breadcrumbs','page']);
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('user.sendPassword');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->middleware(['breadcrumbs','page']);
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
