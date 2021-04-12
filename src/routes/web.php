<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//会員登録ページ
Route::get('signup', 'App\Http\Controllers\SignUpController@index');
Route::post('signup', 'App\Http\Controllers\SignUpController@create');
Route::post('signup/complete', 'App\Http\Controllers\SignUpController@complete');

//ログインページ
Route::get('signin', 'App\Http\Controllers\SignInController@index')->name('signin');
Route::post('signin', 'App\Http\Controllers\SignInController@authenticate');
Route::get('signout', 'App\Http\Controllers\SignInController@signout');
