<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    //
    public function index()
    {
        $data = [
            'email_title'=>'メールアドレス（必須）',
            'password_title'=>'パスワード（必須）',
            'nickname_title'=>'ニックネーム（任意）',
            'icon_title'=>'アイコン（任意）',
        ];

        Log::debug($data);

        return view('signup.index', $data);
    }

    public function post(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $nickname = $request->nickname;
        $icon_image_path = $request->icon;

        $data = [
                'email_title'=>'メールアドレス（必須）',
                'password_title'=>'パスワード（必須）',
                'nickname_title'=>'ニックネーム（任意）',
                'icon_title'=>'アイコン（任意）',
                'email'=>$email,
                'password'=>$password,
                'nickname'=>$nickname,
                'icon_image_path'=>$icon_image_path,
        ];

        Log::debug($data);

        return view('signup.result', $data);
    }
}