<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyPageController extends Controller
{
    public function show(){
        $user = Auth::guard('user')->user();
        return view('my_page.show', compact('user'));
    }
}
