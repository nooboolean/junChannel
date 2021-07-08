@extends('layout.app')

@section('title', 'マイページ')
@include('layout.header')
@include('layout.footer')

@section('content')
<h1 class="mt-3 mb-3">
    <span class="text-success">
        @if (!empty($user->nickname))
            {{ $user->nickname }}
        @else
            名無し
        @endif
    </span>
    さんのマイページ
</h1>
<div class="d-flex flex-column mb-5">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th colspan="2">基本情報</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>名前</td>
                <td>
                    @if (!empty($user->nickname))
                        {{ $user->nickname }}
                    @else
                        名無し
                    @endif
                </td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>アイコン画像</td>
                <td>{{ $user->icon_image_path }}</td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <a href="{{ url('my_page/edit', $user->id) }}" class="btn btn-dark btn-lg">編集</a>
    </div>
</div>


<table class="table">
    <thead class="table-bordered table-sm thead-light">
        <tr>
            <th colspan="1">
                作成したスレッド一覧
            </th>
            <th colspan="1">
                コメントしたスレッド一覧
            </th>
            <th colspan="1">
                お気に入りしたスレッド一覧
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <button type="button" class="btn btn-link">スレッド1</button>
            </td>
            <td>
                <button type="button" class="btn btn-link">スレッド15</button>
            </td>
            <td>
                <button type="button" class="btn btn-link">スレッド39</button>
            </td>
        </tr>
    </tbody>
</table>

@endsection
