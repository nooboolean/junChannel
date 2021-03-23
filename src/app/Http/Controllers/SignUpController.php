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
                'icon_image_path'=>$request->icon,
        ];

        Log::debug($data);

        return view('signup.confirm', $data);
    }

    public function complete(Request $request)
    {

        $data = [
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'nickname'=>$request->nickname,
                'icon_image_path'=>$request->icon,
        ];
        Log::debug($data);

        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nickname = $request->nickname;
        $user->icon_image_path = $request->icon;
        $user->save();

        return view('signup.complete', $data);
    }
}