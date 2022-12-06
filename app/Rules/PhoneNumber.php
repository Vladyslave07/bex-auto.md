<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class PhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match("/^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/", Str::phoneNumber($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Lang::get('messages.phone');
    }
}
