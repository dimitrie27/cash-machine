<?php

namespace App;

use App\Transactions\BankTransaction;
use App\Transactions\CardTransaction;
use App\Transactions\CashTransaction;
use App\Transactions\Transaction;
use Illuminate\Http\Request;
use InvalidArgumentException;

class TransactionFactory
{
    public static function make(string $type, $inputs): Transaction
    {
        switch ($type) {
            case 'App\Transactions\CashTransaction':
                return new CashTransaction($inputs);
            case 'App\Transactions\CardTransaction':
                return new CardTransaction($inputs);
            case 'App\Transactions\BankTransaction':
                return new BankTransaction($inputs);
            default:
                throw new InvalidArgumentException("Invalid transaction type provided.");
        }
    }
}
