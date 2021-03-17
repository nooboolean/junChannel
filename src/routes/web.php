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

//※laravel8から名前空間も記述しないとルーティングエラーとなる

//会員登録ページ
Route::get('signup', 'App\Http\Controllers\SignupController@index');
Route::post('signup', 'App\Http\Controllers\SignupController@post');

Route::post('signup_done', 'App\Http\Controllers\SignupdoneController@post');