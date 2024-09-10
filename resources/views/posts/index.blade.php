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
        <a href="/posts/create">スポットを投稿</a>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <a href="">{{ $post->category->name }}</a>
                    <a href="/posts/{{ $post->id }}"<h2 class='spot_name'>{{ $post->spot_name }}</h2></a>
                    <h3 class='address'>{{ $post->address }}</h3>
                    <!-- ここに写真 -->
                    <p class='description'>{{$spot->description}}</p>
                </div>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links() }}</div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>