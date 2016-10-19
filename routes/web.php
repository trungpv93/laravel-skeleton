<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

//Dashboard
Route::group(['middleware' => ['auth']], function () {
	Route::get('/', ['as' =>'dashboard', 'uses' => 'HomeController@index', 'middleware' => ['role:admin']]);

  //Role
	Route::get('roles', ['as' => 'roles.index', 'uses' => 'Dashboard\RolesController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'Dashboard\RolesController@create', 'middleware' => ['permission:role-create']]);
	Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'Dashboard\RolesController@store', 'middleware' => ['permission:role-create']]);
	Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'Dashboard\RolesController@show']);
	Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'Dashboard\RolesController@edit', 'middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'Dashboard\RolesController@update', 'middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'Dashboard\RolesController@destroy', 'middleware' => ['permission:role-delete']]);

  //Permission
	Route::get('permissions', ['as' => 'permissions.index', 'uses' => 'Dashboard\PermissionsController@index', 'middleware' => ['permission:permission-list|permission-create|permission-edit|permission-delete']]);
	Route::get('permissions/create', ['as' => 'permissions.create', 'uses' => 'Dashboard\PermissionsController@create', 'middleware' => ['permission:permission-create']]);
	Route::post('permissions/create', ['as' => 'permissions.store', 'uses' => 'Dashboard\PermissionsController@store', 'middleware' => ['permission:permission-create']]);
	Route::get('permissions/{id}', ['as' => 'permissions.show', 'uses' => 'Dashboard\PermissionsController@show']);
	Route::get('permissions/{id}/edit', ['as' => 'permissions.edit', 'uses' => 'Dashboard\PermissionsController@edit', 'middleware' => ['permission:permission-edit']]);
	Route::patch('permissions/{id}', ['as' => 'permissions.update', 'uses' => 'Dashboard\PermissionsController@update', 'middleware' => ['permission:permission-edit']]);
	Route::delete('permissions/{id}', ['as' => 'permissions.destroy', 'uses' => 'Dashboard\PermissionsController@destroy', 'middleware' => ['permission:permission-delete']]);

  //User
	Route::get('users', ['as' => 'users.index', 'uses' => 'Dashboard\UsersController@index', 'middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('users/create', ['as' => 'users.create', 'uses' => 'Dashboard\UsersController@create', 'middleware' => ['permission:user-create']]);
	Route::post('users/create', ['as' => 'users.store', 'uses' => 'Dashboard\UsersController@store', 'middleware' => ['permission:user-create']]);
	Route::get('users/{id}', ['as' => 'users.show', 'uses' => 'Dashboard\UsersController@show']);
	Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'Dashboard\UsersController@edit', 'middleware' => ['permission:user-edit']]);
	Route::patch('users/{id}', ['as' => 'users.update', 'uses' => 'Dashboard\UsersController@update', 'middleware' => ['permission:user-edit']]);
	Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'Dashboard\UsersController@destroy', 'middleware' => ['permission:user-delete']]);
});