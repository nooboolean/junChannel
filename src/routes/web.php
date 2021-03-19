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
Route::get('signup', 'App\Http\Controllers\SignUpController@index');
Route::post('signup', 'App\Http\Controllers\SignUpController@create');

Route::post('signup/complete', 'App\Http\Controllers\SignUpController@complete');
//同じコントローラーでアクションを３つ以上用意する場合、Route::getとRoute::postしか使えないのであれば、/以下のルーティングを用意するしかない？
//ルーティングはRoute::getも用意した方が良い？画面更新した際に、postしかメソッドねーぞと怒られちゃう。。。