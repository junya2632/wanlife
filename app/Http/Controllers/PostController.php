<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller
{
    // 投稿の一覧を表示
    public function index()
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); // 投稿一覧のビューを表示
    }

    // 新しい投稿の作成フォームを表示
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }

    // 新しい投稿をデータベースに保存
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    // 特定の投稿の詳細を表示
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]); // 投稿の詳細ビューを表示
    }

    // 投稿の編集フォームを表示
    public function edit($id)
    {
        return view('posts.edit', compact('id')); // 投稿編集フォームのビューを表示
    }

    // 編集された投稿をデータベースに保存
    public function update(Request $request, $id)
    {
        // バリデーションと投稿の更新処理をここに記述
    }

    // 投稿を削除
    public function destroy($id)
    {
        // 投稿の削除処理をここに記述
    }
}
