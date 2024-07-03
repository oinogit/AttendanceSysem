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
        <h1 class="header-ttl">Atte</h1>
        <nav>
            <ul class="header__nav">
            @if (Auth::check())
                <li class="header__nav-item">
                    <a class="header__nav-link" href="/">ホーム</a>
                </li>
                <li class="header__nav-item">
                    <a  class="header__nav-link" href="/attendance">日付一覧</a>
                </li>
                <li class="header__nav-item">
                    <form class="form" action="/logout" method="post">
                        @csrf
                        <button class="header-nav__button">ログアウト</button>
                    </form>
                </li>
            @endif
            </ul>
        </nav>
    </header>

    <main>
    @yield('content')
    </main>

    <footer class="footer">
        <small>Atte,inc.</small>
    </footer>
</body>
</html>