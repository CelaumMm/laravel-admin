<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');

    Route::get('/clear-all', 'ClearController@all')->name('clear.all');
    Route::get('/clear-route', 'ClearController@route')->name('clear.route');
    Route::get('/clear-config', 'ClearController@config')->name('clear.config');
    Route::get('/clear-cache', 'ClearController@cache')->name('clear.cache');
    Route::get('/clear-view', 'ClearController@view')->name('clear.view');
});

// perfil do usuario
Route::get('profile', 'Admin\ProfileController@edit')->name('profile.edit');
Route::post('profile', 'Admin\ProfileController@update')->name('profile.update');

// fotos do perfil
Route::put('foto-update/{id}', 'Admin\ProfileController@updateFoto')->name('profile.foto-update');
Route::delete('foto-destroy/{id}', 'Admin\ProfileController@destroyFoto')->name('profile.foto-destroy');

// home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Auth::routes();
