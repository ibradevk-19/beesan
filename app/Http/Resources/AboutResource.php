<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    public function toArray($request)
    {
       $locale = app()->getLocale();

        $history = collect($this->history_section)->map(function ($row) use ($locale) {
            return [
                'title' => $row['title'][$locale] ?? '',
                'description' => $row['description'][$locale] ?? '',
            ];
        });

        $team = collect($this->team_section)->map(function ($member) use ($locale) {
            return [
                'image' => $member['image'] ? asset('storage/' . $member['image']) : null ,
                'name' => $member['name'][$locale] ?? '',
                'position' => $member['position'][$locale] ?? '',
                'bio' => $member['bio'][$locale] ?? '',
            ];
        });

        $our_roles_section = collect($this->our_roles_section)->map(function ($role) use ($locale) {
            return [
                'title' => $role['title'][$locale] ?? '',
                'description' => $role['description'][$locale] ?? '',
            ];
        });

        return [
            'id' => $this->id,
            'title' => $this->title[$locale] ?? '',
            'body' => $this->body[$locale] ?? '',
            'message' => $this->message[$locale] ?? '',
            'vision' => $this->vision[$locale] ?? '',
            'image_path' => $this->image_path ? asset('storage/' . $this->image_path) : null,
            'cover_image' => $this->cover_image ? asset('storage/' . $this->cover_image) : null,
            'history_section' => $history,
            'team_section' => $team,
            'our_roles_section' => $our_roles_section,
        ];
    }
}
