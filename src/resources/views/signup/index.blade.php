<body>
    <h1>会員登録</h1>
    
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力して下さい。</p>
    @endif

    <form method="POST" action="/signup">
        @csrf
        <p>メールアドレス（必須）</p>
        @error('email')
            <p>{{$message}}</p>
        @enderror
        <input type="text" name="email" value="{{old('email')}}">

        <p>パスワード（必須）</p>
        @error('password')
            <p>{{$message}}</p>
        @enderror
        <input type="password" name="password" value="{{old('password')}}">

        <p>ニックネーム（任意）</p>
        @error('nickname')
            <p>{{$message}}</p>
        @enderror
        <input type="text" name="nickname" value="{{old('nickname')}}">

        <p>アイコン（任意）</p>
        <input type="file" name="icon_image_path" value="{{old('icon_image_path')}}">

        <br/>
        <br/>

        <input type="submit">
    </form>
 </body>
