<?php

namespace App\Http\Controllers;

class ThreadController extends Controller
{
    public function show($threadId)
    {
        return view('thread.show');
    }

    public function post()
    {
        // $categories = Categories::query()->orderBy('id')->pluck('name', 'id'); // TODO: Categorie Model が作成されたらこっちに切り替える
        $categories = [1=>'イワナ',2=>'メンズリゼ', 3=>'アスパラ',4=>'Twice'];
        return view('thread.post', compact('categories'));
    }

    public function create()
    {
        return redirect()->route('thread.show', ['threadId' => $thread->id]);
    }
}
