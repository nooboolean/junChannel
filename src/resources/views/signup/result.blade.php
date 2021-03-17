<body>
    <h1>会員登録</h1>

    <h2>入力内容確認</h2>

    <p>以下の入力内容でよろしいですか？</p>
    
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


        <input type="hidden" name="email" value={{$email}}>
        <input type="hidden" name="password" value={{$password}}>
        <input type="hidden" name="nickname" value={{$nickname}}>
        <input type="hidden" name="icon" value={{$icon_image_path}}>

        <input type="submit" value="確定">

    </form>
 </body>
