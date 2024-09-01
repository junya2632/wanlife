<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 20)
    {
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // 投稿が属するユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 投稿が属するカテゴリ
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // 投稿が持つコメント
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // 投稿が持つ写真
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    // 投稿のお気に入り
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
}
