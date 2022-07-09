<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Thread;
use App\Models\User;

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

    return view('thread.show', compact('thread', 'created_user'));
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
    //dd($data);
    Log::info('スレッド作成時のリクエストパラメータ：', $data);
    $thread = Thread::create([
      'creater_id' => $request['createrId'],
      'name' => $request['name'],
      'category_id' => $request['categoryId'],
    ]);
    Log::info('$thread', [$thread]);
    return redirect()->route('thread.show', $thread);
    //return redirect()->route('thread.show', ['threadId' => $thread->id]);
  }
}
