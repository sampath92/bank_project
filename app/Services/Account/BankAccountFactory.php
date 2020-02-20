<?php

namespace App\Services\Account;

class BankAccountFactory
{
    public static function init($type)
    {
        switch ($type) {
            case config('account.acc_types.saving'):
                return new SavingAccount();
            case config('account.acc_types.current'):
                return new CurrentAccount();
            default:
                return null;
        }
    }
}