<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SignInRequest;

class SignInController extends Controller
{
    public function index()
    {
        return view('signin.index');
    }

    public function signin(SignInRequest $request)
    {
        $validatedRequest = $request->validated();
        Log::info('ログイン時のリクエストパラメータ：', $validatedRequest);

        
        //ログイン認証
        if(Auth::attempt(['email' => $validatedRequest['email'], 'password' => $validatedRequest['password']])){
            // 認証に成功した
            return redirect()->intended('top');
        }
        dd("あ添付");


        //エラー時
        $errors = 'ログインに失敗しました。';
        //return redirect()->back();
        return view('signin.index',['errors' => $errors]);
    }


}
