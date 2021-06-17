<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MyPageController extends Controller
{
    public function show($userId){
        $user = User::find($userId);
        return view('my_page.show', compact('user'));
    }

    public function edit($userId) {
        $user = User::find($userId);
        return view('my_page.edit', compact('user'));
    }

    public function update() {

    }
}
