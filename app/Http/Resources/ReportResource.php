<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray($request)
    {
        $locale = app()->getLocale();
        $locale = $request->header('Set-Language', 'ar');

        return [
            'id' => $this->id,
            'title' => $this->title[$locale] ?? '',
            'body' => $this->body[$locale] ?? '',
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'file' => $this->file ? asset('storage/' . $this->file) : null,
            'date' => $this->date,
            'tag' => $this->tag,
        ];
    }
}
