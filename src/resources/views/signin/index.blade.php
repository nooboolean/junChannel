<body>
    <h1>ログイン</h1>
    
    @if (count($errors) > 0)
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
