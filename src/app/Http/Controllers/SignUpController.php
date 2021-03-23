<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\SignUpRequest;


class SignUpController extends Controller
{
    
    public function index()
    {
        return view('signup.index');
    }

    public function create(SignUpRequest $request)
    {
        $data = [
                'email'=>$request->email,
                'password'=>$request->password,
                'nickname'=>$request->nickname,
                'icon_image_path'=>$request->icon_image_path,
        ];
        Log::info('ユーザー作成時のリクエストパラメータ：', $data);
        return view('signup.confirm', $data);
    }

    public function complete(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nickname' => $request->nickname,
            'icon_image_path' => $request->icon_image_path,
        ]);
        Log::info('ユーザー登録直後のリクエストパラメータ：');
        Log::info($user);
        return view('signup.complete', $user);
    }
}