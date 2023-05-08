<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CashAmount implements Rule
{
    private $maxAmount;

    public function __construct($maxAmount)
    {
        $this->maxAmount = $maxAmount;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value <= $this->maxAmount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The amount of cash should be less then ' . $this->maxAmount;
    }
}
