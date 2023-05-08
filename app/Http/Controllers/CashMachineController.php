<?php

namespace App\Http\Controllers;

use App\BankTransfer;
use App\CashMachine;
use App\CashSource;
use App\CreditCardSource;
use App\TransactionFactory;
use App\Transactions\BankTransaction;
use App\Transactions\CardTransaction;
use App\Transactions\CashTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CashMachineController extends Controller
{
    private CashSource $cashSource;
    private CreditCardSource $creditCardSource;
    private BankTransfer $bankTransfer;
    private CashMachine $cashMachine;

    public function __construct()
    {
        $this->cashSource = new CashSource();
        $this->creditCardSource = new CreditCardSource();
        $this->bankTransfer = new BankTransfer();
        $this->cashMachine = new CashMachine();
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function handleCash()
    {
        return view(
            'forms.cash-form',
            [
                'banknoteTypes' => $this->cashSource::ACCEPTABLE_BANKNOTES
            ]
        );
    }

    public function storeCash(Request $request)
    {
        $this->cashSource->setInputs($request);

        $validator = Validator::make(
            $this->cashSource->getInputs(),
            $this->cashSource->getRules()
        );

        if ($validator->fails()) {
            return redirect('handleCash')
                ->withErrors($validator)
                ->withInput();
        }

        $transaction = TransactionFactory::make(CashTransaction::class, $this->cashSource->getInputs());
        $result = $this->cashMachine->store($transaction);

        if ($result !== null) {
            return redirect('')
                ->with('result', $result);
        }

        return redirect('')
            ->with('transactionError', 'The transaction couldn`t be done.');
    }

    public function handleCreditCard()
    {
        return view('forms.credit-card-form');
    }

    public function storeCreditCard(Request $request)
    {
        $this->creditCardSource->setInputs($request);

        $validator = Validator::make(
            $this->creditCardSource->getInputs(),
            $this->creditCardSource->getRules()
        );

        if ($validator->fails()) {
            return redirect('handleCreditCard')
                ->withErrors($validator)
                ->withInput();
        }

        $transaction = TransactionFactory::make(CardTransaction::class, $this->creditCardSource->getInputs());
        $result = $this->cashMachine->store($transaction);

        if ($result !== null) {
            return redirect('')
                ->with('result', $result);
        }

        return redirect('handleCreditCard')
            ->with('transactionError', 'The transaction couldn`t be done.');
    }

    public function handleBankTransfer()
    {
        return view('forms.bank-transfer-form');
    }

    public function storeBankTransfer(Request $request)
    {
        $this->bankTransfer->setInputs($request);

        $validator = Validator::make(
            $this->bankTransfer->getInputs(),
            $this->bankTransfer->getRules()
        );

        if ($validator->fails()) {
            return redirect('handleBankTransfer')
                ->withErrors($validator)
                ->withInput();
        }

        $transaction = TransactionFactory::make(BankTransaction::class, $this->bankTransfer->getInputs());
        $result = $this->cashMachine->store($transaction);

        if ($result) {
            return redirect('')
                ->with('result', $result);
        }

        return redirect('handleBankTransfer')
            ->with('transactionError','The transaction couldn`t be done.')
            ->withInput();
    }
}
