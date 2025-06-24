<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'og:title',
        'og:description',
        'og:site_name',
        'address',
        'site_url',
        'mobile_number',
        'email',
        'main_logo',
        'footer_logo',
        'bg_logo',
        'footer_bio',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'tiktok_url',
        'telegram_url',
        'services_title',
        'services_body',
        'services_image',
        'projects_title',
        'projects_body',
        'projects_image',
    ];


  

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'og:title' => 'array',
        'og:description' => 'array',
        'og:site_name' => 'array',
        'address' => 'array',
        'footer_bio' => 'array',
        'projects_title' => 'array',
        'projects_body' => 'array',
        'services_title' => 'array',
        'services_body' => 'array',
    ];


    public function getTranslatedTitleAttribute()
    {
        return getTranslated($this,'title');
    }

    public function getTranslatedDescriptionAttribute()
    {
        return getTranslated($this,'description');
    }

    public function getTranslatedFooterAttribute()
    {
        return getTranslated($this,'footer_bio');
    }

    public function getTranslatedAddressAttribute()
    {
        return getTranslated($this,'address');
    }


    public function getTranslatedProjectsTitleAttribute()
    {
        return getTranslated($this,'projects_title');
    }

    public function getTranslatedProjectsBodyAttribute()
    {
        return getTranslated($this,'projects_body');
    }

    public function getTranslatedServicesTitleAttribute()
    {
        return getTranslated($this,'services_title');
    }

    public function getTranslatedServicesBodyAttribute()
    {
        return getTranslated($this,'services_body');
    }

}
