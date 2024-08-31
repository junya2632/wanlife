<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    // コメントが属するユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // コメントが属する投稿
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
