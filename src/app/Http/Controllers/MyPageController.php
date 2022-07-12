<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\MyPageUpdateRequest;

class MyPageController extends Controller
{
  public function show($userId)
  {
    $user = User::find($userId);

    //DBから作成したスレッド一覧の取得
    //スレッドテーブルから作成したユーザIDに引っかかるスレッドのみを抽出
    $created_threads = Thread::where('creater_id', $userId)->get();
    if ($created_threads->isEmpty()) {
      $created_threads = null;
    }

    //DBからコメントしたスレッド一覧の取得
    $my_comments = Comment::where('commenter_id', $userId)->groupBy('thread_id')->get();
    Log::info('$my_comments', [$my_comments]);
    if ($my_comments->isEmpty()) {
      $my_comments = null;
      $commented_threads = null;
    } else {
      $thread_ids = array();
      foreach ($my_comments as $my_comment) {
        Log::info('$my_comment->thread_id', [$my_comment->thread_id]);
        $thread_ids[] = $my_comment->thread_id;
      }
      $commented_threads = Thread::whereIn('id', $thread_ids)->get();
    }

    //DBからお気に入りしたスレッド一覧の取得
    //先にモデルを作る
    //$created_threads = Thread::where('creater_id' , $userId)->get();
    $favorited_threads = null;

    return view('my_page.show', compact('user', 'created_threads', 'commented_threads', 'favorited_threads'));
  }

  public function edit($userId)
  {
    $user = User::find($userId);
    return view('my_page.edit', compact('user'));
  }

  public function update(MyPageUpdateRequest $request)
  {
    $validatedRequest = $request->validated();
    $user = User::find($validatedRequest['userId']);
    $user->email = $validatedRequest['email'];
    $user->nickname = $validatedRequest['nickname'];
    $user->save();
    return redirect()->route('my_page.show', ['userId' => $user->id]);
  }
}
