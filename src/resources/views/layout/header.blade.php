@section('header')
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/top">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">　
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('thread/post') }}">
                        スレッドの作成
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="スレッド/カテゴリ の検索をしてみよう" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                </form>

                @if ( Auth::guard('user')->check() )
                    <?php $user = Auth::guard('user')->user(); ?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('my_page', $user->id) }}">
                            @if (!empty($user->nickname))
                                {{ $user->nickname }}
                            @else
                                名無し
                            @endif
                            さん
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Signout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          通知
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signup') }}">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signin') }}">Signin</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
@endsection
