<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'client_url'             => ['nullable', 'url'],
            'client_logo'           => ['nullable', 'image', 'max:120000'],
        ];
    }


    public function messages(): array
    {
        return [
            'client_url.url' => __('The URL must be a valid link.'),
            'client_logo.required' => __('The image is required.'),
            'client_logo.image' => __('The file must be an image.'),
        ];
    }
}
