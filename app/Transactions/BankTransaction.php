<?php

namespace App\Transactions;

use App\MachineTransaction;

class BankTransaction implements Transaction
{
    private $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function validate()
    {
        $totalProcessing = MachineTransaction::sum('totalAmount');
        if ($totalProcessing + $this->amount() <= self::LIMIT) {
            return true;
        }

        return false;
    }

    public function amount()
    {
        return $this->inputs['amount'];
    }

    public function inputs()
    {
        return $this->inputs;
    }
}
