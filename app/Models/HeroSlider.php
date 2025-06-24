<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'image',
        'title_ar',
        'title_en',
        'sub_title_ar',
        'sub_title_en',
        'have_but',
        'but_title_ar',
        'but_title_en',
        'status'
    ];

    protected $casts = [
        'have_but' => 'boolean',
    ];
}
