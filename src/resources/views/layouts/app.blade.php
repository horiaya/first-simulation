<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    Atte
                </a>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/">ホーム</a>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/attendance">日付一覧</a>
                        </li>
                        <li class="header-nav__item">
                            <form class="logout-form" action="/logout" method="post">
                                @csrf
                                <a class="header-nav__link" href="/login">ログアウト</a>
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>