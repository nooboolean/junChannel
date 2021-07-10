<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\MyPageUpdateRequest;

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

    public function update(MyPageUpdateRequest $request) {
        $validatedRequest = $request->validated();
        $user = User::find($validatedRequest['userId']);
        $user->email = $validatedRequest['email'];
        $user->nickname = $validatedRequest['nickname'];
        $user->save();
        return redirect()->route('my_page.show', ['userId' => $user->id]);
    }
}
