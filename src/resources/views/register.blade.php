<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="stylesheet" href="{{ asset ('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/register.css')}}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <header class="header">
            <div class="header__inner">
                <a class="header__title" href="/register">登録画面</a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/">検索画面へ</a>
                        </li>
                    </ul>
                </nav>
            </div>
    </header>

    <main>
    <div class="dictionary__alert">
        @if(session('message'))
        <div class="dictionary__alert--success">
        {{ session('message') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="dictionary__alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
        <div class="register-content">
            <form class="register-form" action="/register" method="post">
                @csrf
                <div class="register-form__item">
                    <input class="register-form__item-input" type="text" name="keyword" placeholder="キーワード" value="{{ old('keyword') }}">
                </div>
                <div class="register-form__item">
                    <textarea class="register-form__item-textarea" name="description" placeholder="説明">{{ old('description') }}</textarea>
                </div>
                <div class="register-form__button">
                    <button class="register-form__button-submit" type="submit">登録</button>
                </div>
            </form>
        </div>

    </main>
</html>