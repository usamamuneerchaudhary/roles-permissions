<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\Illuminate\Http\Request $request) {

	$user = $request->user();
//	dd($user);

//	dd($user->hasRole('developer'));
//		dd($user->givePermissionsTo('create-tasks'));
	dd($user->can('create-tasks'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => 'role:admin'], function() {
////	Route::group(['middleware' => 'role:admin,edit-posts'], function() {});
//
//		Route::get('/admin', function() {
//		return 'Welcome Admin';
//	});
//});