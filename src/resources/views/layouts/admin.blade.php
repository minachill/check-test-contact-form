<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'FashionablyLate') }}</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200&family=Noto+Serif+JP:wght@200&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
    @yield('css')

</head>
<body>

<header class="header">
    <div class="logo">FashionablyLate</div>
    <div class="nav-links">
        @if (Route::is('register'))
            <a href="{{ route('login') }}">login</a>
        @elseif (Route::is('login'))
            <a href="{{ route('register') }}">register</a>
        @elseif (Auth::check())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link logout-button">logout</button>
            </form>
        @endif
    </div>
</header>

    <main>
        @yield('content')
    </main>
</body>
</html>