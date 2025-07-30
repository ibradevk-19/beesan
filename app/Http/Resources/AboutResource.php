<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    public function toArray($request)
    {
        $locale = app()->getLocale() ?? app()->setLocale('ar');;
        $locale = $request->header('set_language', 'ar');

        return [
            'id' => $this->id,
            'title' => $this->getLocalizedField('title', $locale),
            'body' => $this->getLocalizedField('body', $locale),
            'message' => $this->getLocalizedField('message', $locale),
            'vision' => $this->getLocalizedField('vision', $locale),
            'image_path' => $this->image_path ? asset('storage/' . $this->image_path) : null,
            'cover_image' => $this->cover_image ? asset('storage/' . $this->cover_image) : null,

            'history_section' => collect($this->history_section)->map(function ($row) use ($locale) {
                return [
                    'title' => $row['title'][$locale] ?? '',
                    'description' => $row['description'][$locale] ?? '',
                ];
            }),

            'team_section' => collect($this->team_section)->map(function ($member) use ($locale) {
                return [
                    'image' => !empty($member['image']) ? asset('storage/' . $member['image']) : null,
                    'name' => $member['name'][$locale] ?? '',
                    'position' => $member['position'][$locale] ?? '',
                    'bio' => $member['bio'][$locale] ?? '',
                ];
            }),

            'our_roles_section' => collect($this->our_roles_section)->map(function ($role) use ($locale) {
                return [
                    'title' => $role['title'][$locale] ?? '',
                    'description' => $role['description'][$locale] ?? '',
                ];
            }),
        ];
    }

    /**
     * Helper method to fetch localized fields safely
     */
    private function getLocalizedField($field, $locale)
    {
        return is_array($this->$field)
            ? $this->$field[$locale] ?? ''
            : '';
    }
}
