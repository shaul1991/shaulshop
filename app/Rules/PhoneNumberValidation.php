<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberValidation implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match("/\d{10,11}/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '휴대폰 번호는 "-"제외한 10자리 혹은 11자리 입니다.';
    }
}
