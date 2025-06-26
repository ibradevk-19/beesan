<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    public function toArray($request)
    {
        $locale = app()->getLocale();

        return [
            'title' => $this->title[$locale] ?? '',
            'body' => $this->body[$locale] ?? '',
            'button' => $this->button[$locale] ?? '',
            'message' => $this->message[$locale] ?? '',
            'vision' => $this->vision[$locale] ?? '',
            'image_path' => $this->image_path ? asset('storage/' . $this->image_path) : null,
            'message_image' => $this->message_image ? asset('storage/' . $this->message_image) : null,
            'vision_image' => $this->vision_image ? asset('storage/' . $this->vision_image) : null,
            'cover_image' => $this->cover_image ? asset('storage/' . $this->cover_image) : null,
        ];
    }
}
