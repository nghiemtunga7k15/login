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

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/login', 'Auth\LoginController@redirectLogin')->name('login')->middleware('guest');
Route::get('/login', 'Auth\LoginController@redirectLogin')->name('login')->middleware('guest');
Route::post('/login', 'Auth\LoginController@login')->name('post-login');
Route::get('/loginfacebook', 'Auth\LoginController@profileUserFacebook')->name('get-login-facebook');
Route::get('/logingoogle', 'Auth\LoginController@profileUserGoogle')->name('get-login-google');

Route::get('/register', 'Auth\RegisterController@redirectRegister')->name('register')->middleware('guest');
Route::post('/register', 'Auth\RegisterController@register')->name('post-register');

Route::get('/logout', 'Auth\LoginController@logout')->name('do-logout');

Route::get('/account', 'Auth\AccountController@accountprofileUser')->name('account');
Route::get('/profile', 'Auth\AccountController@profileUser')->name('profile');
Route::post('/account', 'Auth\AccountController@pay')->name('account');
Route::get('/account/profile', 'Auth\AccountController@profileUser')->name('profileUser');
Route::get('/account/payment', 'Auth\AccountController@payUser')->name('paymentUser');
Route::post('/account/payment', 'Auth\AccountController@pay')->name('paymentUser');

Route::group(['middleware' => ['auth_api']], function () {

    Route::get('/', 'Auth\AccountController@profileUserHome')->name('home');
//    Route::get('/', 'Auth\AccountController@profileUserFacebook')->name('home');
});
