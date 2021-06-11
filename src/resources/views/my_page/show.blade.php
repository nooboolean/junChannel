@extends('layout.app')

@section('title', 'マイページ')
@include('layout.header')
@include('layout.footer')

@section('content')
<h1>
    @if (!empty($user->nickname))
        {{ $user->nickname }}
    @else
        名無し
    @endif
    さんのマイページ
</h1>
<table border="1">
    <thead>
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

<table border="1">
    <thead>
        <tr>
            <th colspan="1">
                @if (!empty($user->nickname))
                {{ $user->nickname }}
                @else
                    名無し
                @endif
                さんが作ったスレッド一覧
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                スレッド1
            </td>
        </tr>
    </tbody>
</table>

<table border="1">
    <thead>
        <tr>
            <th colspan="1">
                @if (!empty($user->nickname))
                {{ $user->nickname }}
                @else
                    名無し
                @endif
                さんがコメントしたスレッド一覧
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                スレッド15
            </td>
        </tr>
    </tbody>
</table>

<table border="1">
    <thead>
        <tr>
            <th colspan="1">
                @if (!empty($user->nickname))
                {{ $user->nickname }}
                @else
                    名無し
                @endif
                さんがお気に入りしたスレッド一覧
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                スレッド39
            </td>
        </tr>
    </tbody>
</table>
@endsection
