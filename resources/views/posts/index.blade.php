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
        <h1>ワンライフ</h1>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <a href="">{{ $post->category->name }}</a>
                    <h2 class='spot_name'>{{ $post->spot_name }}</h2>
                    <h3 class='address'>{{ $post->address }}</h3>
                    <p class='description'>{{$spot->description}}</p>
                </div>
            @endforeach
            <div class='paginate'>{{ $posts->links() }}</div>
        </div>
    </body>
</html>
