<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        'body',
        'image',
        'main_imge',
        'start_date',
        'end_date',
        'client',
        'client_logo',
        'have_images',
        'images',
        'have_news'
    ];

    protected $casts = [
        'title' => 'array',   
        'body' => 'array',
        'client' => 'array',
        'images' => 'array',
    ];

    
   
    public function getTranslatedTitleAttribute()
    {
        return getTranslated($this,'title');
    }


    public function getTranslatedBodyAttribute()
    {
        return getTranslated($this,'body');
    }

    public function getTranslatedClientAttribute()
    {
        return getTranslated($this,'client');
    }
    

}
