<?php

namespace App\Transactions;

use App\MachineTransaction;

class CashTransaction implements Transaction
{
    public const CASH_LIMIT = 10000;

    private $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function validate()
    {
        $isValid = false;

        if ($this->amount() <= self::CASH_LIMIT) {
            $totalProcessing = MachineTransaction::sum('totalAmount');
            if ($totalProcessing + $this->amount() <= self::LIMIT) {
                $isValid = true;
            }
        }

        return $isValid;
    }

    public function amount()
    {
        return $this->inputs['total'];
    }

    public function inputs()
    {
        return $this->inputs;
    }
}
