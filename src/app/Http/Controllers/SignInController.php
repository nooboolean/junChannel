<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\SignInRequest;

use Auth;

class SignInController extends Controller
{
    public function index()
    {
        return view('signin.index');
    }

    public function authenticate(SignInRequest $request)
    {
        $validatedRequest = $request->validated();
        Log::info('ログイン時のリクエストパラメータ：', $validatedRequest);


        //ログイン認証
        if(Auth::guard('user')->attempt(['email' => $validatedRequest['email'], 'password' => $validatedRequest['password']])){
            return redirect()->intended('top');
        }

        $errors = 'ログインに失敗しました。';
        return view('signin.index', ['errors' => $errors]);
    }

    public function signout()
    {
        Auth::guard('user')->logout();
        return redirect('/signin');
    }


}
