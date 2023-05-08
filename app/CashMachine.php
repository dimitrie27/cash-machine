<?php

namespace App;

use App\Transactions\Transaction;

class CashMachine
{
    public const MAX_LIMIT = 20000;

    private $moneySource;

    private $maxLimit;

    /**
     * @return mixed
     */
    public function getMoneySource()
    {
        return $this->moneySource;
    }

    /**
     * @param mixed $moneySource
     */
    public function setMoneySource($moneySource): void
    {
        $this->moneySource = $moneySource;
    }

    /**
     * @return mixed
     */
    public function getMaxLimit()
    {
        return $this->maxLimit;
    }

    /**
     * @param mixed $maxLimit
     */
    public function setMaxLimit($maxLimit): void
    {
        $this->maxLimit = $maxLimit;
    }


    /**
     * Store transaction in Database
     */
    public function store(Transaction $transaction)
    {
        $response = null;
        if ($transaction->validate()) {
            $response = MachineTransaction::create([
                'inputs' => json_encode($transaction->inputs()),
                'totalAmount' => $transaction->amount()
            ]);
        }

        return $response;
    }

}
