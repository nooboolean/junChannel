<body>
    <h1>会員登録完了</h1>

    <h2>以下の内容で確定しました。</h2>
    
    <form method="POST" action="/signup_done">
        @csrf
        <p>{{$email_title}}</p>
        @if ($email != "")
        <p>{{$email}}</p>
        @endif

        <p>{{$password_title}}</p>
        @if ($password != "")
        <p>{{$password}}</p>
        @endif

        <p>{{$nickname_title}}</p>
        @if ($nickname != "")
        <p>{{$nickname}}</p>
        @endif

        <p>{{$icon_title}}</p>
        @if ($icon_image_path != "")
        <p>{{$icon_image_path}}</p>
        @endif

        <br/>
        <br/>

        {{-- <input type="submit" value="確定"> --}}

    </form>
 </body>
