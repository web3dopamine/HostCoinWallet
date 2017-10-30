<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
   return view('auth.login');
});

Route::auth();
// Route::post('/home/{key}', 'HomeController@index')->middleware(['auth']);
Route::get('/home/value={key}', 'HomeController@index')->middleware(['auth', 'check']);

Route::get('/transactions/{key}', 'transacCtrl@index')->middleware(['auth', 'check']);
Route::post('transactions', 'transacCtrl@store');


Route::get('/exit', function(){
  return view('auth.login');  
});

Route::get('/google_auth', [
		'middleware'=>'auth',
		'uses'=>'Controller@google_auth'
		]);

Route::post('/verify', [
		'middleware'=>'auth',
		'uses'=>'Controller@verify'
		]);

Route::get('history', [
	 'middleware'=>'auth',
	 'uses' => 'transacCtrl@history'
]);

Route::group(['middleware'=>'auth'], function(){
	Route::resource('explorer', 'explorerCtrl');
});	

Route::get('/balance', [
		'middleware'=>'auth',
		'uses'=>'transacCtrl@index'
		]);

Route::get('/check_balance', [
		'middleware'=>'auth',
		'uses'=>'transacCtrl@checkBalance'
		]);

Route::group(['middleware'=>'auth'], function(){
	Route::resource('blog', 'blogCtrl');
});

Route::get('/admin_panel', 'blogCtrl@admin_panel');
Route::get('/blogs_list', 'blogCtrl@show');
Route::get('/delete_blog', 'blogCtrl@destroy');
Route::post('/create_blog', 'blogCtrl@create_blog');

Route::get('settings', 'settingsCtrl@index');

Route::post('change_password', [
		'middleware'=>'auth',
		'uses'=>'settingsCtrl@update'
		]);

