<body>
    <h1>会員登録</h1>
    
    <form method="POST" action="/signup">
        @csrf
        <p>メールアドレス（必須）</p>
        <input type="text" name="email" required>

        <p>パスワード（必須）</p>
        <input type="password" name="password" required>

        <p>ニックネーム（任意）</p>
        <input type="text" name="nickname">

        <p>アイコン（任意）</p>
        <input type="file" name="icon_image_path">

        <br/>
        <br/>

        <input type="submit">
    </form>
 </body>
