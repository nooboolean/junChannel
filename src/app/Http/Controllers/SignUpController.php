<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignUpController extends Controller
{
    
    public function index()
    {
        return view('signup.index');
    }

    public function create(Request $request)
    {
        $data = [
                'email'=>$request->email,
                'password'=>$request->password,
                'nickname'=>$request->nickname,
                'icon_image_path'=>$request->icon_image_path,
        ];
        Log::debug($data);
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
        Log::debug($user);
        return view('signup.complete', $user);
    }
}