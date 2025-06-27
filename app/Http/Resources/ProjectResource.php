<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'title' => $this->title[$locale] ?? '',
            'body' => $this->body[$locale] ?? '',
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => 'end',
            'beneficiaries_count' => 100,
            'location' => 'gaza',
            'budgeit' => 1522.444
        ];
    }
}
