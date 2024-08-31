<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    // ユーザーが持つ投稿
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // ユーザーが持つコメント
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // ユーザーのお気に入り
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
}
