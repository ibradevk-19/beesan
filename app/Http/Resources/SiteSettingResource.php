<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteSettingResource extends JsonResource
{
    public function toArray($request)
    {
        $locale = app()->getLocale();
        $locale = $request->header('Set-Language', 'ar');

        return [
            'id' => $this->id,
            'title' => $this->title[$locale] ?? '',
            'description' => $this->description[$locale] ?? '',
            'main_logo' => $this->main_logo ? asset('storage/' . $this->main_logo) : null,
            'address' => $this->address[$locale] ?? '',
            'site_url' => $this->site_url,
            'mobile_number' =>  $this->mobile_number,
            'email' =>  $this->email,
            'footer_logo' => $this->footer_logo ? asset('storage/' . $this->footer_logo) : null,
            'bg_logo' => $this->bg_logo ? asset('storage/' . $this->bg_logo) : null,
            'footer_bio' => $this->footer_bio[$locale] ?? '',
            'facebook_url' => $this->facebook_url ?? '',
            'twitter_url' => $this->twitter_url,
            'instagram_url' => $this->instagram_url,
            'tiktok_url' => $this->tiktok_url,
            'telegram_url' => $this->telegram_url,
        ];
    }
}
