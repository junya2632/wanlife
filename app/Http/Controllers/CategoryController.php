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

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index')->with([
        'posts' => $category->getByCategory(20),
        'keyword' => "",
        ]);
    }
    
    public function search(Category $category, Request $request)
    {
        $keyword = $request->input('keyword');
        
        $query = Post::query();
        
        if(!empty($keyword)) {
            $query->where('spot_name', 'LIKE', "%{$keyword}%")->orWhere('address', 'LIKE', "%{$keyword}%");
        }
        
        $posts = $query->where('category_id', $category->id)->get();
        
        return view('categories.index')->with(['posts' => $posts,'categories' => $category, 'keyword' => $keyword]);
    }
    
}
