<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class PostController extends Controller
{
    // 投稿の一覧を表示
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(20), 'keyword' => ""]); // 投稿一覧のビューを表示
    }
    
    public function search(Request $request, Post $post)
    {
        $keyword = $request->input('keyword');
        
        $query = Post::query();
        
        if(!empty($keyword)) {
            $query->where('spot_name', 'LIKE', "%{$keyword}%")->orWhere('address', 'LIKE', "%{$keyword}%");
        }
        
        $post = $query->paginate(20);
        
        return view('posts.index')->with(['posts' => $post, 'keyword' => $keyword]);
    }
    
    // 新しい投稿の作成フォームを表示
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }

    // 新しい投稿をデータベースに保存
    public function store(PostRequest $request, Post $post, Photo $photo)
    {
        $photo_url = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();//cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
        
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        
        $input_photo = ['post_id' => $post->id];
        $input_photo += ['photo_url' => $photo_url];
        $photo->fill($input_photo)->save();
        return redirect('/posts/' . $post->id);
    }

    // 特定の投稿の詳細を表示
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]); // 投稿の詳細ビューを表示
    }

    // 投稿の編集フォームを表示
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit')->with(['post' => $post, 'categories' => $categories]); // 投稿編集フォームのビューを表示
    }

    // 編集された投稿をデータベースに保存
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/index' . $post->id);
    }

    // 投稿を削除
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/index');// 投稿の削除処理をここに記述
    }
}
