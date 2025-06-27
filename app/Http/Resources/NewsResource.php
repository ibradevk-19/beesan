<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request)
    {
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'title' => $this->title[$locale] ?? '',
            'body' => $this->body[$locale] ?? '',
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'published_at' => $this->published_at,
        ];
    }
}
