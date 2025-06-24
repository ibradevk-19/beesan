<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeroSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // تأكد من السماح للجميع أو غيّرها حسب صلاحياتك
    }

    public function rules(): array
    {
        return [
            'url'             => ['nullable', 'url'],
            'image'           => ['nullable', 'image'], // 2MB max
            'title_ar'        => ['required', 'string'],
            'title_en'        => ['required', 'string'],
            'sub_title_ar'    => ['nullable', 'string'],
            'sub_title_en'    => ['nullable', 'string'],
            'have_but'        => ['required', 'boolean'],
            'but_title_ar'    => ['nullable', 'string'],
            'but_title_en'    => ['nullable', 'string'],
            'status'          => ['required', 'in:1,0'],
        ];
    }

    public function messages(): array
    {
        return [
            'url.url' => __('The URL must be a valid link.'),
            'image.required' => __('The image is required.'),
            'image.image' => __('The file must be an image.'),
            'status.in' => __('The status must be active or inactive.'),
            // أضف هنا بقية الرسائل حسب الحاجة
        ];
    }
}
