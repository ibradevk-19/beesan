<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title.ar' => 'required|string',
            'title.en' => 'required|string',
    
            'body' => 'required|array',
            'body.ar' => 'required|string',
            'body.en' => 'required|string',
    
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'video_url' => 'nullable|url',
            'type' => 'required',

            'meta_title' => 'nullable|array',
            'meta_title.ar' => 'required|string',
            'meta_title.en' => 'required|string ',
            'meta_description' => 'nullable|array',
            'meta_description.ar' => 'required|string',
            'meta_description.en' => 'required|string',
            'meta_keywords' => 'nullable|array',
            'meta_keywords.ar' => 'required|string',
            'meta_keywords.en' => 'required|string',
            
            'canonical_url' => 'nullable|url',
            'og_image' => 'nullable|string',
            'og_title' => 'nullable|array',
            'og_description' => 'nullable|array',
    
            'status' => 'nullable|in:draft,published,archived',
            'published_at' => 'nullable|date',
    
            'category_id' => 'nullable|exists:categories,id',
            'is_featured' => 'nullable|boolean',
            'images.*' => 'image|nullable',
        ];
    }
}
