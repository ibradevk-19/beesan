<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image'
    ];

    protected $casts = [
        'title' => 'array',   
        'body' => 'array',
    ];

    
   
    public function getTranslatedTitleAttribute()
    {
        return getTranslated($this,'title');
    }


    public function getTranslatedBodyAttribute()
    {
        return getTranslated($this,'body');
    }
    

}
