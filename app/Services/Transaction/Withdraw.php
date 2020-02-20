<?php

namespace App\Services\Transaction;


class Withdraw extends Transaction
{
    /**
     * @var string
     */
    protected $action_type = 'debit';

    /**
     * Withdraw constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $account_number
     * @param $amount
     *
     * @return mixed
     * @throws \Exception
     */
    public static function create($account_number, $amount)
    {
        $transaction = new Withdraw();
        $transaction->create($account_number, $transaction->action_type, $amount);
        return $transaction->commit();
    }

    /**
     * setCurrentBalance
     */
    public function setCurrentBalance()
    {
        $account = $this->account_repository->read($this->account_number);
        $this->current_balance = $account->balance - $this->amount;
        $this->account_repository->update($this->account_number, ['balance' => $this->amount]);
    }

    public function calculateAllowedBalance()
    {
    }
}