<?php

namespace App\Transactions;

interface Transaction
{
    public const LIMIT = 20000;

    /**
    * Validate Inputs
    */
    public function validate();

    /**
    * Return total amount
    */
    public function amount();

    /**
    * Return Inputs
    */
    public function inputs();
}
