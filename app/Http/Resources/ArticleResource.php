<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
     public function toArray($request)
    {
        $locale = app()->getLocale();
        $locale = $request->header('set_language', 'ar');

        return [
            'id' => $this->id,
            'title' => $this->title[$locale] ?? '',
            'slug' => $this->slug,
            'body' => $this->body[$locale] ?? '',
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'published_at' => $this->published_at,
            'meta_title' => $this->meta_title[$locale] ?? '',
            'meta_description' => $this->meta_description[$locale] ?? '',
            'meta_keywords' => $this->meta_keywords[$locale] ?? '',
        ];
    }
}
