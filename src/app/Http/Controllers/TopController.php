<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
  public function __invoke()
  {

    //DBから最近作成された最新１０件のスレッドを最新順に取得する
    $recently_created_threads = Thread::orderBy('id', 'DESC')->take(10)->get();

    //DBからスレッドを最近コメントされた順にソートして取得
    //まずコメントテーブルからコメントを外部キーであるスレッドテーブルIDが重複しないように１０件取得する。
    //スレッドテーブルが最新のコメント投稿日時順に10種類取得できているので、スレッドをその順番で１０件取得できる。
    $recently_comments = Comment::orderBy('id', 'DESC')->whereIn('id', function ($query) {
      $query->select(DB::raw('MAX(id) As id'))->from('comments')->groupBy('thread_id');
    })->get();
    Log::info('$recently_comments', [$recently_comments]);
    $thread_ids = array();
    foreach ($recently_comments as $recently_comment) {
      Log::info('$recently_comment->thread_id', [$recently_comment->thread_id]);
      $thread_ids[] = $recently_comment->thread_id;
    }
    $recently_commented_threads = Thread::whereIn('id', $thread_ids)->orderByRaw('FIELD(id, '.implode(',', $thread_ids).')')->take(10)->get();
    Log::info('$recently_commented_threads', [$recently_commented_threads]);

    return view('top', compact('recently_created_threads', 'recently_commented_threads'));
  }
}
