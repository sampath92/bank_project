<?php

namespace App\Services\Transaction;

class TransactionFactory
{
    public static function init($type)
    {
        switch ($type) {
            case 'withdraw':
                return new Withdraw();
            case 'deposit':
                return new Deposit();
            default:
                return null;
        }
    }
}


