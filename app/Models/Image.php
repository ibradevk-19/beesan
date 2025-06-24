<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id', 'image_path', 'caption', 'order'
    ];

    protected $casts = [
        'caption' => 'array',
    ];

    public function Article()
    {
        return $this->belongsTo(Article::class);
    }
}
