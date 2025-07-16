<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|array',
            'description' => 'nullable|array',
            'og_title' => 'nullable|array',
            'og_description' => 'nullable|array',
            'og_site_name' => 'nullable|array',
            'address' => 'nullable|array',
            'site_url' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'email' => 'nullable|email',
            'footer_bio' => 'nullable|array',
            'facebook_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'tiktok_url' => 'nullable|string',
            'telegram_url' => 'nullable|string',

            // الصور اختيارية
            'main_logo' => 'nullable|image',
            'footer_logo' => 'nullable|image',
            'bg_logo' => 'nullable|image',
            'bg_logo' => 'nullable|image',
            'projects_image' => 'nullable|image',
            'services_image' => 'nullable|image',
            'services_title' => 'nullable|array',
            'services_body' => 'nullable|array',
            'projects_title' => 'nullable|array',
            'projects_body' => 'nullable|array',

            'hero_title' => 'nullable|array',
            'hero_body' => 'nullable|array',
            'hero_image' => 'nullable|image',
            
            'beneficiaries_count' => 'nullable',
            'project_count' => 'nullable',
            'partner_count' => 'nullable',
            'years_experience_count' => 'nullable',

        ];
    }
}
