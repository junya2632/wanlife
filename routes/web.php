<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index']);

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
