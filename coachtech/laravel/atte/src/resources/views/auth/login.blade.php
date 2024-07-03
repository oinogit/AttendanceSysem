<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <h1 class="header-ttl">Atte</h1>
    </header>

    <main>
        <div class="atte-content">
            <div class="atte-content__ttl">
                <h2>ログイン</h2>
            </div>
            <form  class="form" action="/login" method="post">
                @csrf
                <div class="form-item">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス" />
                    <p class="form-error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-item">
                    <input type="password" name="password" placeholder="パスワード" />
                    <p class="form-error">
                    @error('password')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-item__button">
                    <button class="form-item__button-submit">ログイン</button>
                </div>
            </form>
            <div class="atte-content__text">
                <p>アカウントをお持ちでない方はこちらから</p>
                <a href="/register">会員登録</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <small>Atte,inc.</small>
    </footer>
</body>
</html>