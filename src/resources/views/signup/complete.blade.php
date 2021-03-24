<body>
    <h1>会員登録完了</h1>

    <h2>以下の内容で確定しました。</h2>
    
    @csrf
    <p>メールアドレス（必須）</p>
    <p>{{$email}}</p>

    <p>ニックネーム（任意）</p>
    @if ($nickname != "")
    <p>{{$nickname}}</p>
    @endif

    <p>アイコン（任意）</p>
    @if ($icon_image_path != "")
    <p>{{$icon_image_path}}</p>
    @endif

 </body>
