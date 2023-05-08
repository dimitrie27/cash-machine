<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateFormat implements Rule
{
    private $dateFormat;

    private $formatAcceptedByDate;

    public function __construct($dateFormat)
    {
        $this->dateFormat = $dateFormat;

        switch ($dateFormat) {
            case 'mm/yyyy':
                $this->formatAcceptedByDate = 'm/Y';
                break;
            case 'dd/mm/yyyy':
                $this->formatAcceptedByDate = 'd/m/Y';
                break;
        }
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
        $date = \DateTime::createFromFormat($this->formatAcceptedByDate, $value);

        return $date !== false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute field should be in `' . $this->dateFormat . '` format.';
    }
}
