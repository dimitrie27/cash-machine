<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AccountNumberFormat implements Rule
{
    public const NO_OF_CHAR = 6;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen($value) === self::NO_OF_CHAR;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute should have ' . self::NO_OF_CHAR . ' characters.';
    }
}
