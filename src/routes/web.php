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
    Route::get('signup', 'App\Http\Controllers\SignUpController@index')->name('signup');
    Route::post('signup', 'App\Http\Controllers\SignUpController@confirm');
    Route::post('signup/create', 'App\Http\Controllers\SignUpController@create');
    //ログインページ
    Route::get('signin', 'App\Http\Controllers\SignInController@index')->name('signin');
    Route::post('signin', 'App\Http\Controllers\SignInController@authenticate');
});

//ログイン済みユーザーのみアクセス可能ルート
Route::middleware(['authenticated'])->group(function () {
    Route::get('signup/complete', 'App\Http\Controllers\SignUpController@complete');
    Route::get('signout', 'App\Http\Controllers\SignInController@signout')->name('signout');

    // マイページ画面
    Route::get('my_page/{userId}', 'App\Http\Controllers\MyPageController@show')->name('my_page.show');
    Route::get('my_page/edit/{userId}', 'App\Http\Controllers\MyPageController@edit');
    Route::put('my_page/update', 'App\Http\Controllers\MyPageController@update');

    Route::get('thread/post', 'App\Http\Controllers\ThreadController@post')->name('thread.post');
    Route::post('thread/create', 'App\Http\Controllers\ThreadController@create')->name('thread.create');
});

Route::get('/', 'App\Http\Controllers\TopController');
Route::get('/top', 'App\Http\Controllers\TopController');

Route::get('thread/show/{threadId}', 'App\Http\Controllers\ThreadController@show')->name('thread.show');
Route::post('thread/show/{threadId}', 'App\Http\Controllers\ThreadController@commentPost')->name('comment.post');
