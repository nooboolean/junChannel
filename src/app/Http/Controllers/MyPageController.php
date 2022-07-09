<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;

use App\Http\Requests\MyPageUpdateRequest;

class MyPageController extends Controller
{
    public function show($userId){
        $user = User::find($userId);

        //DBから作成したスレッド一覧の取得
        //スレッドテーブルから作成したユーザIDに引っかかるスレッドのみを抽出
        $created_threads = Thread::where('creater_id' , $userId)->get();
        //dd($threads);

        //DBからコメントしたスレッド一覧の取得
        //先にモデルを作る
        //$commented_threads = Thread::where('creater_id' , $userId)->get();
        $commented_threads = null;

        //DBからお気に入りしたスレッド一覧の取得
        //先にモデルを作る
        //$created_threads = Thread::where('creater_id' , $userId)->get();
        $favorited_threads = null;

        return view('my_page.show', compact('user', 'created_threads', 'commented_threads', 'favorited_threads'));
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
