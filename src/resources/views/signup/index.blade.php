<body>
    <h1>会員登録</h1>
    
    <form method="POST" action="/signup">
        @csrf
        <p>{{$email_title}}</p>
        <input type="text" name="email" required>

        <p>{{$password_title}}</p>
        <input type="password" name="password" required>

        <p>{{$nickname_title}}</p>
        <input type="text" name="nickname">

        <p>{{$icon_title}}</p>
        <input type="file" name="icon">

        <br/>
        <br/>

        <input type="submit">
    </form>
 </body>
