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
        <a class="btn btn-dark btn-lg">編集する</a>
    </div>
</div>

@endsection
