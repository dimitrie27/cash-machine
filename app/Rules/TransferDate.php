<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TransferDate implements Rule
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
        $date = \DateTime::createFromFormat('d/m/Y', $value);
        $now = new \DateTime();

        return $now > $date;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute can`t be older than current date.';
    }
}
