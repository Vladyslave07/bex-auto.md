<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lots_url' => ['required'],
            'detail_url' => ['required'],
            'token' => ['required'],
            'category' => ['required'],
            'status' => ['required'],
            'domain_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'lots_url.required' => 'Lots url обязательно',
            'detail_url.required' => 'Detail url обязательно',
            'token.required' => 'Token обязательно',
        ];
    }
}
