<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\SignUpRequest;

use Auth;

class SignUpController extends Controller
{

    public function index()
    {
        return view('signup.index');
    }

    public function confirm(SignUpRequest $request)
    {
        $validatedRequest = $request->validated();
        $data = [
            'email'=>$validatedRequest['email'],
            'password'=>$validatedRequest['password'],
            'nickname'=>$validatedRequest['nickname'],
            'icon_image_path'=>$request->icon_image_path,
        ];
        Log::info('ユーザー作成時のリクエストパラメータ：', $data);
        return view('signup.confirm', $data);
    }

    public function create(SignUpRequest $request)
    {
        $validatedRequest = $request->validated();
        // TODO :例外処理(DB insert失敗)
        $user = User::create([
            'email'=>$validatedRequest['email'],
            'password'=>Hash::make($validatedRequest['password']),
            'nickname'=>$validatedRequest['nickname'],
            'icon_image_path'=>$request->icon_image_path,
        ]);
        Log::info('ユーザー登録直後のリクエストパラメータ：');
        Log::info($user);
        // TODO :例外処理(ログイン失敗)
        Auth::guard('user')->attempt(['email' => $validatedRequest['email'], 'password' => $validatedRequest['password']]);
        return redirect('signup/complete');
    }

    public function complete() {
        $user = Auth::guard('user')->user();
        return view('signup.complete', $user);
    }
}
