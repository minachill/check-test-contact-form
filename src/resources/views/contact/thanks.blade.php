<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Thanks</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contact/thanks.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200&family=Noto+Serif+JP:wght@200&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    <div class="thanks-wrapper">
        <p class="background-text">Thank you</p>
        <div class="thanks-message">
            <p class="main-text">お問い合わせありがとうございました</p>
            <a href="{{ route('contact.index') }}" class="home-button">HOME</a>
        </div>
    </div>
</body>
</html>