<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.delete');
});

Route::group(['middleware' => ['auth']], function(){
    // ルーティングの設定
    Route::get('/posts/index', [PostController::class, 'index'])->name('index');
    
    //検索された時のルーティング
    Route::get('/search', [PostController::class, 'search'])->name('posts.search');
    
    // PostControllerのリソースルートを定義
    Route::resource('posts', PostController::class);
    
    //投稿作成表示用ルーティング
    Route::get('/posts/create', [PostController::class, 'create']);
    
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する。
    Route::get('/posts/{post}', [PostController::class, 'show']);
    
    //ブログ投稿作成実行用ルーティング
    Route::post('/posts', [PostController::class, 'store']);// PostControllerのリソースルートを定義
    Route::resource('posts', PostController::class);
    
    //投稿作成表示用ルーティング
    Route::get('/posts/create', [PostController::class, 'create']);
    
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する。
    Route::get('/posts/{post}', [PostController::class, 'show']);
    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    
    Route::delete('/posts/{post}', [PostController::class, 'delete']);
    
    Route::get('/categories/{category}', [CategoryController::class,'index']);
});

require __DIR__.'/auth.php';