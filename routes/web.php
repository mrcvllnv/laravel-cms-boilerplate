<?php

Auth::routes(['verify' => true, 'register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users/fetch', 'UsersController@fetch')->name('users.fetch');
});
