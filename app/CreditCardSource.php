<?php

namespace App;

use App\Rules\CardExpirationDate;
use App\Rules\CardNumber;
use App\Rules\CvvFormat;
use App\Rules\DateFormat;
use App\Rules\LettersAndSpaces;
use Illuminate\Http\Request;

class CreditCardSource
{
    private $cardNo;

    private $expirationDate;

    private $cardHolder;

    private $cvv;

    private $amount;

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo): void
    {
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     */
    public function setExpirationDate($expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    /**
     * @param mixed $cardHolder
     */
    public function setCardHolder($cardHolder): void
    {
        $this->cardHolder = $cardHolder;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv): void
    {
        $this->cvv = $cvv;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    public function setInputs(Request $request)
    {
        $inputs = $request->all();
        $this->setCardNo($inputs['cardNo']);
        $this->setExpirationDate($inputs['expirationDate']);
        $this->setCardHolder($inputs['cardHolder']);
        $this->setCvv($inputs['cvv']);
        $this->setAmount($inputs['amount']);
    }

    public function getInputs()
    {
        return [
            'cardNo' => $this->getCardNo(),
            'expirationDate' => $this->getExpirationDate(),
            'cardHolder' => $this->getCardHolder(),
            'cvv' => $this->getCvv(),
            'amount' => $this->getAmount()
        ];
    }

    /**
     * Get the validation rules for Credit Card source
     */
    public function getRules(): array
    {
        return [
            'cardNo' => ['required', new CardNumber()],
            'expirationDate' => ['required', new DateFormat('mm/yyyy'), new CardExpirationDate()],
            'cardHolder' => ['required', new LettersAndSpaces()],
            'cvv' => ['required', 'numeric', new CvvFormat()],
            'amount' => 'required|numeric'
        ];
    }
}
