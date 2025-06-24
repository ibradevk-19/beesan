<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    protected $casts = [
        'name' => 'array', 
    ];


    public function getTranslatedNameAttribute()
    {
        return getTranslated($this,'name');
    }
}
