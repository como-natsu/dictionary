<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__title" href="/">検索画面</a>
            <nav>
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/register">登録画面へ</a>
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

        <div class="dictionary-content">
            <form class="search-form" action="/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </form>
            <div class="dictionary-table">
                <table class="dictionary-table__inner">
                    @foreach($dictionaries as $dictionary)
                    <tr class="dictionary-table__row">
                        <td class=dictionary-table__item>
                            <form class="update-form" action="/dictionary/update" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="update-form__item">
                                    <div class=update-form__item-time>
                                        {{$dictionary->created_at->format('Y-m-d')}}
                                    </div>
                                    <input type="hidden" name="id" value="{{ $dictionary['id'] }}">
                                    <input class="update-form__item-input" type="text" name="keyword" value="{{ $dictionary['keyword'] }}">
                                    <textarea class="update-form__item-textarea" name="description" >{{ $dictionary['description'] }}
                                    </textarea>
                                </div>
                                <div class="update-form__button">
                                    <button class="update-form__button-submit" type="submit">更新</button>
                                </div>
                            </form>
                        </td>
                        <td class="dictionary-table__item">
                            <form class="delete-form" action="/delete" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="{{ $dictionary['id'] }}">
                                    <button class="delete-form__button-submit" type="submit">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
</body>
</html>