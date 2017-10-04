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

Route::get('/home', 'HomeController@index');

Route::get('/exit', function(){
  return view('auth.login');  
});

Route::group(['middleware'=>'auth'], function(){
	Route::resource('transactions', 'transacCtrl');
});	
Route::get('history', [
	 'middleware'=>'auth',
	 'uses' => 'transacCtrl@history'
]);

Route::group(['middleware'=>'auth'], function(){
	Route::resource('explorer', 'explorerCtrl');
});	

Route::get('/balance', 'transacCtrl@index');

Route::get('/check_balance', 'transacCtrl@checkBalance');