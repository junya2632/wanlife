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
        <x-app-layout>
            <x-slot name="header">
                show
            </x-slot>
            <h1 class='spot_name'>{{ $post->spot_name }}</h1>
            <div class='content'>
                <div class='content_post'>
                    <h3 class='address'>{{ $post->address }}</h3>
                    <div class="photo">
                        @foreach ($post->photos as $photo)
                            <img class="post_images" src="{{ $photo->photo_url }}" alt="画像がありません"> 
                        @endforeach
                    </div>
                    <p class='body'>{{$post->body}}</p>
                </div>
            </div>
            <div class='edit'>
                <a href="/posts/{{ $post->id }}/edit">編集</a>
            </div>
            <div class='footer'>
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>