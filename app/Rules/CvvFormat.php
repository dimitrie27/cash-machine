<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CvvFormat implements Rule
{
    public const NO_OF_DIGITS = 3;
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen($value) === self::NO_OF_DIGITS;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute should have ' . self::NO_OF_DIGITS . ' digits.';
    }
}
