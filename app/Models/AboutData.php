<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutData extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'button',
        'message',
        'vision',
        'text_one',
        'text_ther',
        'text_tow',
        'image_path',
        'message_image',
        'vision_image',
        'cover_image'
    ];

    protected $casts = [
        'title' => 'array',   
        'body' => 'array',
        'button' => 'array',
        'message' => 'array',
        'vision' => 'array'
    ];

    public function getTranslatedTitleAttribute()
    {
        return getTranslated($this,'title');
    }

    public function getTranslatedBodyAttribute()
    {
        return getTranslated($this,'body');
    }

    public function getTranslatedButtonAttribute()
    {
        return getTranslated($this,'button');
    }


    public function getTranslatedMessageAttribute()
    {
        return getTranslated($this,'message');
    }

    public function getTranslatedVisionAttribute()
    {
        return getTranslated($this,'vision');
    }

}
