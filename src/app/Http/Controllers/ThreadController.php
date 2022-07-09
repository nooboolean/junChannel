<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use App\Models\Comment;

use Auth;

class ThreadController extends Controller
{
  public function show($threadId)
  {
    $thread = Thread::find($threadId);
    Log::info('$thread', [$thread]);

    //DBから作成したユーザ名の取得
    //ユーザテーブルから表示中のスレッドIDに引っかかるユーザのみを抽出
    $created_user = User::where('id', $thread->creater_id)->first();
    Log::info('$created_user', [$created_user]);
    //dd($created_user);

    //ログイン中のユーザを取得
    $user = Auth::guard('user')->user();
    //$user = User::find($userId);
    Log::info('$user', [$user]);

    //このスレッドに紐づいているコメントをすべて取得
    $comments = Comment::where('thread_id', $thread->id)->get();
    Log::info('$comments', [$comments]);

    return view('thread.show', compact('thread', 'created_user', 'user', 'comments'));
  }

  public function post()
  {
    $categories = Category::query()->orderBy('id')->pluck('name', 'id');
    Log::info('$categories', [$categories]);
    return view('thread.post', compact('categories'));
  }

  public function create(Request $request)
  {
    //DBにスレッドを登録
    /**
     * スレッドid
     * 作成ユーザー
     * スレッド名
     * 属するカテゴリid
     * 作成日時
     * 更新日時
     * 更新理由
     */
    //dd($request);
    $data = [
      'createrId' => $request['createrId'],
      'name' => $request['name'],
      'categoryId' => $request['categoryId'],
    ];

    // echo gettype($request['createrId']), "\n";
    // echo gettype($request['name']), "\n";
    // echo gettype($request['categoryId']), "\n";

    Log::info('スレッド作成時のリクエストパラメータ：', $data);
    $thread = Thread::create([
      'creater_id' => $request['createrId'],
      'name' => $request['name'],
      'category_id' => $request['categoryId'],
    ]);
    Log::info('$thread', [$thread]);
    return redirect()->route('thread.show', $thread);
    // return redirect()->route('thread.show', ['threadId' => $thread->id]);
  }

  public function commentPost(Request $request)
  {
    /**
     * スレッドにコメントを投稿
     * コメントテーブルにコメントを新規追加する処理
     * ・投稿者ID
     * ・ゲストID
     * ・スレッドID
     * ・コメントナンバー
     * ・コメント内容
     * ・投稿日時
     * ・更新日時
     */
    $data = [
      'commenter_id' => $request['userId'],
      'guests_commenter_id' => "notGuest",
      'thread_id' => $request['thread_id'],
      'comment_number' => $request['comment_number'],
      'content' => $request['content'],
    ];
    Log::info('コメント投稿時のリクエストパラメータ：', $data);

    $comment = Comment::create([
      'commenter_id' => $request['userId'],
      'guests_commenter_id' => "notGuest",
      'thread_id' => $request['thread_id'],
      'comment_number' => $request['comment_number'],
      'content' => $request['content'],
    ]);
    Log::info('$comment', [$comment]);

    $threadId = $request['thread_id'];

    return redirect()->route('thread.show', $threadId);
  }
}
