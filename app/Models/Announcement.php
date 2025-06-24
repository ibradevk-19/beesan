<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'external_link',
        'expiry_date',
        'status',
    ];

    protected $casts = [
        'title' => 'array',  
        'description' => 'array',  
        
    ];
    

    public function getTranslatedTitleAttribute()
    {
        return getTranslated($this,'title');
    }

    public function getTranslatedDescriptionAttribute()
    {
        return getTranslated($this,'description');
    }


    public function attachments()
    {
        return $this->hasMany(AnnouncementAttachment::class);
    }

}
