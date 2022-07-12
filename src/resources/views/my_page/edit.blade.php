@extends('layout.app')

@section('title', 'マイページ')
@include('layout.header')
@include('layout.footer')

@section('content')
    <div class="col-md-12">
        <h1 class="mt-5 mb-5">
            <span class="text-success">
                @if (!empty($user->nickname))
                    {{ $user->nickname }}
                @else
                    名無し
                @endif
            </span>
            さんのマイページ
        </h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>入力に問題があります。再入力して下さい。</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['url' => '/my_page/update', 'method' => 'put', 'files' => true]) !!}
        {!! Form::hidden('userId', $user->id) !!}
        <div class="d-flex flex-column mb-5">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th colspan="2">会員情報</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{!! Form::label('name', '氏名') !!}</td>
                        <td>
                            @php
                                if (!empty($user->nickname)) {
                                    $nickname = $user->nickname;
                                } else {
                                    $nickname = '名無し';
                                }
                            @endphp
                            {!! Form::text('nickname', $nickname, ['class' => 'form-control', 'placeholder' => '氏名']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>メールアドレス</td>
                        <td>{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'メールアドレス']) !!}</td>
                    </tr>
                    <tr>
                        <td>アイコン画像</td>
                        <td>{!! Form::file('image') !!}</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <a href="{{ url('my_page', $user->id) }}" class="btn btn-dark btn-lg">戻る</a>
                {!! Form::submit('会員情報を更新', ['class' => 'btn btn-dark btn-lg']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
