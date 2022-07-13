<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;

class CategoryController extends Controller
{
  public function show($categoryId)
  {
    $category = Category::find($categoryId);
    Log::info('$category', [$category]);

    //dd($category);

    // DBからすべてのカテゴリを取得
    $categories = Category::get();
    if ($categories->isEmpty()) {
      $categories = null;
    }
    Log::info('$categories', [$categories]);

    //DBから指定したカテゴリに属するスレッドを最近コメントされた順にソートして取得
    //コメントはスレッドに属する
    //スレッドはカテゴリに属する
    //なので、まずカテゴリを決めないと、最終的に抽出したいコメントを絞れない
    //まずDBから指定したカテゴリに属するスレッドをすべて取得する
    $threads_in_this_category = Thread::where('category_id', $categoryId)->take(10)->get();
    Log::info('$threads_in_this_category', [$threads_in_this_category]);
    //dd($threads_in_this_category);

    //まずコメントテーブルからコメントを外部キーであるスレッドテーブルIDが重複しないように１０件取得する。
    //スレッドテーブルが最新のコメント投稿日時順に10種類取得できているので、スレッドをその順番で１０件取得できる。
    $recently_comments = Comment::orderBy('id', 'DESC')->whereIn('id', function ($query) {
      $query->select(DB::raw('MAX(id) As id'))->from('comments')->groupBy('thread_id');
    })->get();
    Log::info('$recently_comments', [$recently_comments]);
    if ($recently_comments->isEmpty()) {
      $recently_comments = null;
      $recently_commented_threads = null;
    } else {
      //上記で取得したコメントIDが属するスレッドのみを取得する
      $thread_ids = array();
      foreach ($recently_comments as $recently_comment) {
        Log::info('$recently_comment->thread_id', [$recently_comment->thread_id]);
        $thread_ids[] = $recently_comment->thread_id;
      }
      Log::info('$thread_ids[]', $thread_ids);
      Log::info('aaa');

      $recently_commented_thread_ids_in_this_category = array();
      foreach ($thread_ids as $thread_id) {
        Log::info('$thread_id', [$thread_id]);
        foreach ($threads_in_this_category as $thread_in_this_category) {
          Log::info('$thread_in_this_category', [$thread_in_this_category]);
          if($thread_id == $thread_in_this_category->id){
            $recently_commented_thread_ids_in_this_category[] = $thread_id;
            break;
          }
        }
      }
      Log::info('$recently_commented_thread_ids_in_this_category[]', $recently_commented_thread_ids_in_this_category);

      $recently_commented_threads = Thread::whereIn('id', $recently_commented_thread_ids_in_this_category)->orderByRaw('FIELD(id, ' . implode(',', $recently_commented_thread_ids_in_this_category) . ')')->take(10)->get();
      Log::info('$recently_commented_threads', [$recently_commented_threads]);
    }

    return view('category.show', compact('category', 'categories', 'recently_commented_threads'));
  }
}
