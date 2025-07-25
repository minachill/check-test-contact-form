<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200&family=Noto+Serif+JP:wght@200&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="site-header">
        <div class="site-header__inner">
            <a class="site-header__logo" href="/">
                <h1 class="site-title">Fashionably Late</h1>
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>