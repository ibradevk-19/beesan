<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutDataRequest extends FormRequest
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
            'button' => 'required|array',
            'button.ar' => 'required|string',
            'button.en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'message_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'message' => 'required|array',
            'message.ar' => 'required|string',
            'message.en' => 'required|string',
            'vision' => 'required|array',
            'vision.ar' => 'required|string',
            'vision.en' => 'required|string',
            'text_one' => 'nullable|array',
            'text_one.ar' => 'nullable|string',
            'text_one.en' => 'nullable|string',
            'text_ther' => 'nullable|array',
            'text_ther.ar' => 'nullable|string',
            'text_ther.en' => 'nullable|string',
            'text_tow' => 'nullable|array',
            'text_tow.ar' => 'nullable|string',
            'text_tow.en' => 'nullable|string',
            'history_section' => 'nullable',
            'team_section' => 'nullable'
        ];
    }
}
