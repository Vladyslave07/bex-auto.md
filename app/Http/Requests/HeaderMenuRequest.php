<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HeaderMenuRequest extends FormRequest
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
             'title' => 'required',
             'link' => 'required',
             'slug' => Rule::unique('header_menus')->ignore($this->route('id')),
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
            'title.required' => __('validation.required', ['attribute' => trans('backpack::fields.title')]),
            'link.required' => __('validation.required', ['attribute' => trans('backpack::fields.link')]),
            'slug.unique' => __('validation.unique', ['attribute' => trans('backpack::fields.slug')]),
        ];
    }
}
