<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CardExpirationDate implements Rule
{
    public const NO_OF_MONTHS = 2;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $date = \DateTime::createFromFormat('m/Y', $value);
        $now = new \DateTime();
        $diff = $date->diff($now)->m;

        return $date !== false &&  $diff >= self::NO_OF_MONTHS;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute field should be at least ' . self::NO_OF_MONTHS . ' months bigger than current month.';
    }
}
