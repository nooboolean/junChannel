@extends('layout.app')

@section('title', "{$thread->name}")
@include('layout.header')
@include('layout.footer')

@section('content')
    <div class="h3 mt-5 mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title font-weight-bold mb-4"><span>{{ $thread->name }}</span></h3>
                <h4 class="card-text mb-3">ここにスレッド概要を表示(DBを改修予定)</h4>
                {{-- 作成ユーザ名、作成日時、属するカテゴリ（リンク付き） --}}
                <h5 class="card-text"><img src="{{ asset('images/person.png') }}" alt=""> {{ $created_user->nickname }} ★ {{ $thread->created_at }}</h5>
            </div>
        </div>
    </div>







@endsection
