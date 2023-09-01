<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title' => 'required|min:3|max:255',
             'image' => 'required',
             'auction_images.*.logo' => 'required',
             'text.*.title' => 'max:255',
             'text.*.text' => 'max:25000',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'auction_images.*.logo.required' => 'Логотип аукциона обязателен для заполнения',
            'text.*.title.max' => 'Максимальное число символов в заголовке текста - 255',
            'text.*.text.max' => 'Максимальное число символов в тексте - 25000',
        ];
    }
}
