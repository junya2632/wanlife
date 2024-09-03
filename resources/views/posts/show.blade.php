<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>blog</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <h1 class='spot_name'>{{ $post->spot_name }}</h1>
        <div class='content'>
            <div class='content_post'>
                <h3 class='address'>{{ $post->address }}</h3>
                 <!-- ここに写真を載せる -->
                <p class='body'>{{$spot->body}}</p>
            </div>
        </div>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</html>
