<body>
    <h1>会員登録</h1>

    <h2>入力内容確認</h2>

    <p>以下の入力内容でよろしいですか？</p>
    
    <form method="POST" action="/signup/complete">
        @csrf
        <p>メールアドレス（必須）</p>
        <p>{{$email}}</p>

        <p>パスワード（必須）</p>
        <p>{{$password}}</p>

        <p>ニックネーム（任意）</p>
        @if ($nickname != "")
        <p>{{$nickname}}</p>
        @endif

        <p>アイコン（任意）</p>
        @if ($icon_image_path != "")
        <p>{{$icon_image_path}}</p>
        @endif

        <br/>
        <br/>


        <input type="hidden" name="email" value={{$email}}>
        <input type="hidden" name="password" value={{$password}}>
        <input type="hidden" name="nickname" value={{$nickname}}>
        <input type="hidden" name="icon" value={{$icon_image_path}}>

        <input type="submit" value="確定">

    </form>
 </body>
