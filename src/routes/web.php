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

//ログイン済みユーザーがアクセスすると元の画面に戻る
Route::middleware(['unauthenticated'])->group(function () {
    //会員登録ページ
    Route::get('signup', 'App\Http\Controllers\SignUpController@index');
    Route::post('signup', 'App\Http\Controllers\SignUpController@create');
    //ログインページ
    Route::get('signin', 'App\Http\Controllers\SignInController@index')->name('signin');
    Route::post('signin', 'App\Http\Controllers\SignInController@authenticate');
});

//ログイン済みユーザーのみアクセス可能ルート
Route::middleware(['authenticated'])->group(function () {
    Route::post('signup/complete', 'App\Http\Controllers\SignUpController@complete');
    Route::get('signout', 'App\Http\Controllers\SignInController@signout');
});

Route::get('/', function () {
    return view('top');
});

Route::get('/top', function () {
    return view('top');
});

