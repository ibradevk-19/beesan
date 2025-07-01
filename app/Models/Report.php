<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'file',
        'date',
        'tag',   // y_reports -- fin_reports -- pre_reports
    ];

    protected $casts = [
        'title' => 'array',
        'body' => 'array',
    ];
}
