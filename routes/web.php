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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


//Dashboard
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', ['as' =>'dashboard', 'uses' => 'IndexController@dashboard', 'middleware' => ['role:admin']]);

  //Role
	Route::get('roles', ['as' => 'roles.index', 'uses' => 'Dashboard\RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'Dashboard\RoleController@create', 'middleware' => ['permission:role-create']]);
	Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'Dashboard\RoleController@store', 'middleware' => ['permission:role-create']]);
	Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'Dashboard\RoleController@show']);
	Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'Dashboard\RoleController@edit', 'middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'Dashboard\RoleController@update', 'middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'Dashboard\RoleController@destroy', 'middleware' => ['permission:role-delete']]);

  //Permission
	Route::get('permissions', ['as' => 'permissions.index', 'uses' => 'Dashboard\PermissionController@index', 'middleware' => ['permission:permission-list|permission-create|permission-edit|permission-delete']]);
	Route::get('permissions/create', ['as' => 'permissions.create', 'uses' => 'Dashboard\PermissionController@create', 'middleware' => ['permission:permission-create']]);
	Route::post('permissions/create', ['as' => 'permissions.store', 'uses' => 'Dashboard\PermissionController@store', 'middleware' => ['permission:permission-create']]);
	Route::get('permissions/{id}', ['as' => 'permissions.show', 'uses' => 'Dashboard\PermissionController@show']);
	Route::get('permissions/{id}/edit', ['as' => 'permissions.edit', 'uses' => 'Dashboard\PermissionController@edit', 'middleware' => ['permission:permission-edit']]);
	Route::patch('permissions/{id}', ['as' => 'permissions.update', 'uses' => 'Dashboard\PermissionController@update', 'middleware' => ['permission:permission-edit']]);
	Route::delete('permissions/{id}', ['as' => 'permissions.destroy', 'uses' => 'Dashboard\PermissionController@destroy', 'middleware' => ['permission:permission-delete']]);

  //User
	Route::get('users', ['as' => 'users.index', 'uses' => 'Dashboard\UserController@index', 'middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('users/create', ['as' => 'users.create', 'uses' => 'Dashboard\UserController@create', 'middleware' => ['permission:user-create']]);
	Route::post('users/create', ['as' => 'users.store', 'uses' => 'Dashboard\UserController@store', 'middleware' => ['permission:user-create']]);
	Route::get('users/{id}', ['as' => 'users.show', 'uses' => 'Dashboard\UserController@show']);
	Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'Dashboard\UserController@edit', 'middleware' => ['permission:user-edit']]);
	Route::patch('users/{id}', ['as' => 'users.update', 'uses' => 'Dashboard\UserController@update', 'middleware' => ['permission:user-edit']]);
	Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'Dashboard\UserController@destroy', 'middleware' => ['permission:user-delete']]);
});