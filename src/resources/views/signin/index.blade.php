<body>
    <h1>ログイン</h1>

    {{-- ログインが必要な画面に遷移しようとした際のメッセージ --}}
    @if (!empty($authRequired))
        <p>この先はログインが必要です</p>
    @endif
    {{-- ログイン失敗もしくはログインバリデーション失敗時のエラー --}}
    @if ($errors->any() || !empty($signinError))
        <p>メールアドレス、またはパスワードが違います。</p>
    @endif

    <form method="POST" action="/signin">
        @csrf
        <p>メールアドレス</p>
        <input type="text" name="email" value="{{old('email')}}">

        <p>パスワード</p>
        <input type="password" name="password" value="{{old('password')}}">

        <br/>
        <br/>

        <input type="submit" value="ログイン">
    </form>
 </body>
