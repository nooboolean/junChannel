<body>
    <h1>ログイン</h1>

    @if (!empty($errors))
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
