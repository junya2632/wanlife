<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // カテゴリが持つ投稿
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    
    public function getByCategory(int $limit_count = 20)
    {
        return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

