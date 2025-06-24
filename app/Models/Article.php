<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'status',
        'published_at',
        'type',
        'video_url',

        // SEO fields
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'og_title',
        'og_description',

        // Relations
        'category_id',

        // Extra
        'views',
        'is_featured',
    ];

    protected $casts = [
        'title' => 'array',   
        'body' => 'array',

        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array',

        'og_title' => 'array',
        'og_description' => 'array',

        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
   
    public function getTranslated($key)
    {
        $locale = app()->getLocale();
        return $this->{$key}[$locale] ?? $this->{$key}['en'] ?? null;
    }

    public function getTranslatedTitleAttribute()
    {
        return getTranslated($this,'title');
    }

    public function getTranslatedBodyAttribute()
    {
        return getTranslated($this,'body');
    }

    public function getTranslatedMetaDescriptionAttribute()
    {
        return getTranslated($this,'meta_description');
    }
}
