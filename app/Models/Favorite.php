<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;

    // お気に入りが属するユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // お気に入りが属する投稿
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
