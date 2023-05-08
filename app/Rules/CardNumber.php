<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CardNumber implements Rule
{
    public const CARD_NO_FIRST_DIGIT = '4';
    public const CARD_MAX_DIGITS = '16';

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen($value) == self::CARD_MAX_DIGITS && (int)$value[0] == self::CARD_NO_FIRST_DIGIT;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute need to have ' . self::CARD_MAX_DIGITS . ' digits and should start with digit ' . self::CARD_NO_FIRST_DIGIT;
    }
}
