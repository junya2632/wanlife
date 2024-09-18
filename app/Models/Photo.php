<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'post_id',
        'photo_url',
        ];
    
    // 写真が属する投稿
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
