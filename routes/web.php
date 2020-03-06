<?php

Auth::routes(['verify' => true, 'register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('users/datatables', 'UserDataTablesController')->name('users.datatables');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users/{user}', 'UsersController@edit')->name('users.edit');

    Route::get('organizations/datatables', 'OrganizationDataTablesController')->name('organizations.datatables');
    Route::get('organizations', 'OrganizationsController@index')->name('organizations.index');
});
