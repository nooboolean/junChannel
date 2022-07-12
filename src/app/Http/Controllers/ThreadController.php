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

    //ログイン中のユーザを取得
    $user = Auth::guard('user')->user();
    Log::info('$user', [$user]);

    //このスレッドに紐づいているコメントをすべて取得
    $comments = Comment::where('thread_id', $thread->id)->get();
    Log::info('$comments', [$comments]);
    if ($comments->isEmpty()) {
      Log::info('$commentsは空です');
      $comments = null;
    } else {
      Log::info('$commentsは空ではありません');
      //このコメントオブジェクトに、コメントした人のニックネームを追加したい
      foreach ($comments as $comment) {
        Log::info('$comment->commenter_id', [$comment->commenter_id]);
        //コメントIDからユーザのニックネームを取得する
        $commenter = User::where('id', $comment->commenter_id)->first();
        Log::info('$commenter', [$commenter]);
        Log::info('$commenter', [$commenter->nickname]);
        //そのユーザのニックネームをコメントオブジェクトに追加する
        $comment->commenter_nickname = $commenter->nickname;
      }
    }

    // DBからすべてのカテゴリを取得
    $categories = Category::get();
    if ($categories->isEmpty()) {
      $categories = null;
    }
    Log::info('$categories', [$categories]);

    return view('thread.show', compact('thread', 'created_user', 'user', 'comments', 'categories'));
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
