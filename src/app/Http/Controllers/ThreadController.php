<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Thread;

class ThreadController extends Controller
{
  public function show($threadId)
  {
    $thread = Thread::find($threadId);
    return view('thread.show', compact('thread'));
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
