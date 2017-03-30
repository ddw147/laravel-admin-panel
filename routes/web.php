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

Route::get('/', 'HomeController@index')->middleware('auth','verified');

Route::get('/v2', function () {
    return view('sidenav');
});

Auth::routes();

Route::get('/home',  function () {
    return view('index');
});

Route::get('otpverification','OtpController@show');
Route::post('otpverification','OtpController@verify');
Route::post('resend-otp','OtpController@resendOtp');