<?php



Route::get('login', 'Admin\LoginController@showLogin')
    ->name('admin.login.show')
    ->middleware('guest:admin');

Route::get('/','Admin\HomeController@index')->name('admin.home');

Route::post('login','Admin\LoginController@postLogin')
    ->name('admin.login.post')
    ->middleware('guest:admin');

Route::post('logout','Admin\LoginController@postLogout')
    ->name('admin.logout')
    ->middleware('auth:admin');