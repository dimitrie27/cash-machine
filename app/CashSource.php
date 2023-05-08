<?php

namespace App;

use App\Rules\CashAmount;
use App\Rules\NotEmptyAndPositive;

class CashSource
{
    public const ACCEPTABLE_BANKNOTES = [
        '1', '5', '10', '50', '100'
    ];

    public const MAX_CASH_AMOUNT = 10000;

    private $quantityTypeOne;

    private $quantityTypeFive;

    private $quantityTypeTen;

    private $quantityTypeFifty;

    private $quantityTypeOneHundred;

    private $total;

    /**
     * @return mixed
     */
    public function getQuantityTypeOne()
    {
        return $this->quantityTypeOne;
    }

    /**
     * @param mixed $quantityTypeOne
     */
    public function setQuantityTypeOne($quantityTypeOne): void
    {
        $this->quantityTypeOne = $quantityTypeOne;
    }

    /**
     * @return mixed
     */
    public function getQuantityTypeFive()
    {
        return $this->quantityTypeFive;
    }

    /**
     * @param mixed $quantityTypeFive
     */
    public function setQuantityTypeFive($quantityTypeFive): void
    {
        $this->quantityTypeFive = $quantityTypeFive;
    }

    /**
     * @return mixed
     */
    public function getQuantityTypeTen()
    {
        return $this->quantityTypeTen;
    }

    /**
     * @param mixed $quantityTypeTen
     */
    public function setQuantityTypeTen($quantityTypeTen): void
    {
        $this->quantityTypeTen = $quantityTypeTen;
    }

    /**
     * @return mixed
     */
    public function getQuantityTypeFifty()
    {
        return $this->quantityTypeFifty;
    }

    /**
     * @param mixed $quantityTypeFifty
     */
    public function setQuantityTypeFifty($quantityTypeFifty): void
    {
        $this->quantityTypeFifty = $quantityTypeFifty;
    }

    /**
     * @return mixed
     */
    public function getQuantityTypeOneHundred()
    {
        return $this->quantityTypeOneHundred;
    }

    /**
     * @param mixed $quantityTypeOneHundred
     */
    public function setQuantityTypeOneHundred($quantityTypeOneHundred): void
    {
        $this->quantityTypeOneHundred = $quantityTypeOneHundred;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->total = $total;
    }

    /**
     * Set Inputs
     */
    public function setInputs($request)
    {
        $inputs = $request->all();

        $this->setQuantityTypeOne($inputs['quantityType1']);
        $this->setQuantityTypeFive($inputs['quantityType5']);
        $this->setQuantityTypeTen($inputs['quantityType10']);
        $this->setQuantityTypeFifty($inputs['quantityType50']);
        $this->setQuantityTypeOneHundred($inputs['quantityType100']);
        $this->setTotal(array_sum(array_values($inputs)));
    }

    /**
     * Get the inputs from request
     */
    public function getInputs()
    {
        return [
            'quantityType1' => $this->getQuantityTypeOne(),
            'quantityType5' => $this->getQuantityTypeFive(),
            'quantityType10' => $this->getQuantityTypeTen(),
            'quantityType50' => $this->getQuantityTypeFifty(),
            'quantityType100' => $this->getQuantityTypeOneHundred(),
            'total' => $this->getTotal()
        ];
    }

    /**
     * Get the validation rules for Cash Source
     */
    public function getRules(): array
    {
        $notEmptyAndPositive = new NotEmptyAndPositive();

        return [
            'quantityType1' => ['required', $notEmptyAndPositive],
            'quantityType5' => ['required', $notEmptyAndPositive],
            'quantityType10' => ['required', $notEmptyAndPositive],
            'quantityType50' => ['required', $notEmptyAndPositive],
            'quantityType100' => ['required', $notEmptyAndPositive],
            'total' => [new CashAmount(self::MAX_CASH_AMOUNT)]
        ];
    }

}
