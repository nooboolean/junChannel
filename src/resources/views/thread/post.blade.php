@extends('layout.app')

@section('title', 'スレッド作成')
@include('layout.header')
@include('layout.footer')

@section('content')
    <div class="col-md-12">
        <div class="mt-5 mb-5">
            {!! Form::open(['url' => '/thread/create', 'method' => 'post', 'files' => true]) !!}
            {!! Form::hidden('createrId', Auth::guard('user')->user()->id) !!}
            <div class="form-group">
                {!! Form::label('inputTitle', 'タイトル') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'inputTitle', 'placeholder' => 'タイトル']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('selectCategory', 'カテゴリ') !!}
                {!! Form::select('categoryId', $categories, null, [
                    'class' => 'form-control',
                    'id' => 'selectCategory',
                    'placeholder' => '選択してください',
                ]) !!}
            </div>
            {!! Form::submit('スレッド作成', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
