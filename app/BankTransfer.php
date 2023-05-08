<?php

namespace App;

use App\Rules\AccountNumberFormat;
use App\Rules\DateFormat;
use App\Rules\TransferDate;
use Illuminate\Http\Request;

class BankTransfer
{
    private $transferDate;

    private $customerName;

    private $accountNo;

    private $amount;

    /**
     * @return mixed
     */
    public function getTransferDate()
    {
        return $this->transferDate;
    }

    /**
     * @param mixed $transferDate
     */
    public function setTransferDate($transferDate): void
    {
        $this->transferDate = $transferDate;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName): void
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * @param mixed $accountNo
     */
    public function setAccountNo($accountNo): void
    {
        $this->accountNo = $accountNo;
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

        $this->setTransferDate($inputs['transferDate']);
        $this->setCustomerName($inputs['customerName']);
        $this->setAccountNo($inputs['accountNo']);
        $this->setAmount($inputs['amount']);
    }

    public function getInputs()
    {
        return [
            'transferDate' => $this->getTransferDate(),
            'customerName' => $this->getCustomerName(),
            'accountNo' => $this->getAccountNo(),
            'amount' => $this->getAmount(),
        ];
    }

    /**
     * Get form validation rules for Bank Transfer
     */
    public function getRules(): array
    {
        return [
            'transferDate' => ['required', new DateFormat('dd/mm/yyyy'), new TransferDate()],
            'customerName' => 'required|alpha',
            'accountNo' => ['required', 'alpha', new AccountNumberFormat()],
            'amount' => 'required|numeric',
        ];
    }

}
