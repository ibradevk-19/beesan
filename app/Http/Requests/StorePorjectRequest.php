<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePorjectRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'title.ar'      => 'required|string',
            'title.en'      => 'required|string',
            'body.ar'       => 'required|string',
            'body.en'       => 'required|string',
            'client.ar'     => 'nullable|string',
            'client.en'     => 'nullable|string',
            'start_date'    => 'nullable|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'main_imge'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'client_logo'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'images.*'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'have_images'   => 'nullable|boolean',
            'have_news'     => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.ar.required' => 'عنوان المشروع (عربي) مطلوب.',
            'title.en.required' => 'عنوان المشروع (إنجليزي) مطلوب.',
            'body.ar.required'  => 'وصف المشروع (عربي) مطلوب.',
            'body.en.required'  => 'وصف المشروع (إنجليزي) مطلوب.',
        ];
    }
}
