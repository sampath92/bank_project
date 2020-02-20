<?php

namespace App\Services\Account;

/**
 * Class SavingAccount
 * @package App\Services\Account
 */
class SavingAccount extends Account
{
    protected $type;
    /**
     * SavingAccount constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->type = config('account.account_types.saving');
        $this->generateAccountNumber();
    }

    /**
     * @return mixed|string
     * generate acc numbers (will defer for account types)
     */
    public function generateAccountNumber()
    {
        $account_number = config('constants.bank_code'). '-' .
                          $this->branch_id . '-' . abs(crc32(uniqid()));
        $this->account_number = $account_number;
        return $account_number;
    }

    /**
     * @param $account_number
     *
     * @return array|mixed
     * different account types will have different return types
     *
     */
    public function getAccountDetails($account_number)
    {
        $data = $this->accounts_repository->read($account_number);
        return [
            'type' => $data->type,
            'account_number' => $data->account_number,
            'balance' => $data->balance,
        ];
    }

    public function setBranch($branch_id) {
    }

    public function getBranch() {
    }
}