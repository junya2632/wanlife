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
                edit
            </x-slot>
            <h1>投稿の編集</h1>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="spot_name">
                    <h2>スポット名</h2>
                    <input type="text" name="post[spot_name]" placeholder="スポット名" value={{ $post->spot_name }}>
                    <p class="spot_name__error" style="color:red">{{ $errors->first('post.spot_name') }}</p>
                </div>
                <div class="address">
                    <h2>住所</h2>
                    <input type="text" name="post[address]" placeholder="住所" value={{ $post->address }}>
                    <p class="address__error" style="color:red">{{ $errors->first('post.address') }}</p>
                </div>
                <div class="description">
                    <h2>投稿の見出し</h2>
                    <textarea name="post[description]" placeholder="見出し">{{ $post->description }}</textarea>
                    <p class="description__error" style="color:red">{{ $errors->first('post.description') }}</p>
                </div>
                <div class="category">
                    <h2>カテゴリーを選択</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="photo">
                <h2>写真をアップロード</h2>
                </div>
                <div class="body">
                <h2>スポットについて</h2>
                <textarea name="post[body]" placeholder="詳細を記入してください">{{ $post->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="更新">
            </form>
            <div class='footer'>
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>