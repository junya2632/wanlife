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
                　category
            </x-slot>
            <div class="index_title">
                <h1>ワンライフ</h1>
                <a class="create_post" href="/posts/create">スポットを投稿</a>
                <div>
                    <form action="/categories/search" method="GET">
                        <input type="text" name="keyword" value="{{ $keyword }}">
                        <input type="submit" value="検索">
                    </form>
                </div>
            </div>
            <div class='posts'>
                @foreach($posts as $post)
                    <div class='post'>
                        <p><a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                        <p><a href="/posts/{{ $post->id }}" class='spot_name'>{{ $post->spot_name }}</a></p>
                        <h3 class='address'>{{ $post->address }}</h3>
                        <div class="photo">
                            @foreach ($post->photos as $photo)
                                <img class="post_images" src="{{ $photo->photo_url }}" alt="画像がありません"> 
                            @endforeach
                        </div>
                        <p class='description'>{{$post->description}}</p>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  class="delete" type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                        </form>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>{{ $posts->links() }}</div>
        </x-app-layout>
    </body>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</html>