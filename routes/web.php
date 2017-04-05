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

Route::group(['middleware' => ['auth','verified']], function() {



	Route::get('/', 'HomeController@index');

	Route::get('/v2', function () {
	    return view('index');
	});

	//admin tasks
	Route::group(['middleware' => 'role:owner'], function() {
	    //
	    Route::resource('users','UserController');
	    Route::post('users-block/{user}','UserController@block_user');
	    Route::post('users-unblock/{user}','UserController@unblock_user');
	});


	Route::get('change-password','UserController@showchangepassword');
	Route::post('change-password','UserController@updatepassword');

});


Auth::routes();

Route::get('/home',  function () {
    return view('index');
});

Route::get('otpverification','OtpController@show');
Route::post('otpverification','OtpController@verify');
Route::post('resend-otp','OtpController@resendOtp');