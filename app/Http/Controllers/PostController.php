<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 投稿の一覧を表示
    public function index(Post $post)
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
        // $input = $request['post'];
        // $input['user_id'] = Auth::id();
        // $post->fill($input)->save();
        // return redirect('/posts/' . $post->id);
        dd($request->all()); // データを表示して確認
    }

    // 特定の投稿の詳細を表示
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]); // 投稿の詳細ビューを表示
    }

    // 投稿の編集フォームを表示
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]); // 投稿編集フォームのビューを表示
    }

    // 編集された投稿をデータベースに保存
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }

    // 投稿を削除
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');// 投稿の削除処理をここに記述
    }
}
