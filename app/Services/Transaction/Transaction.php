<?php

namespace App\Services\Transaction;


use App\Repositories\BankAccountsRepository;
use App\Repositories\BankTransactionsRepository;

abstract class Transaction implements TransactionContract
{
    /**
     * @var
     */
    protected $transaction_amount;

    /**
     * @var
     */
    protected $action_type;

    /**
     * @var
     */
    protected $account_number;

    /**
     * @var
     */
    protected $current_balance;

    /**
     * @var BankTransactionsRepository
     */
    protected $transaction_repository;

    /**
     * @var BankAccountsRepository
     */
    protected $account_repository;

    protected $allowed_balance;

    protected $amount;

    /**
     * Transaction constructor.
     */
    public function __construct()
    {
        $this->transaction_repository = new BankTransactionsRepository();
        $this->account_repository = new BankAccountsRepository();
    }

    /**
     * @param $account_number
     * @param $transaction_amount
     *
     * @return mixed
     */
    public abstract static function create($account_number, $transaction_amount);

    /**
     * @param $action
     *
     * @return mixed
     */
    public function setActionType($action)
    {
        $this->action_type = $action;
    }

    /**
     * @return mixed
     */
    public function getActionType()
    {
        return $this->action_type;
    }

    /**
     * @param $transaction_amount
     *
     * @return mixed|void
     * @throws \Exception
     */
    public function setAmount($transaction_amount)
    {
        if ($this->allowed_balance >= $transaction_amount) {
            $this->amount = $transaction_amount;
        } else {
            throw new \Exception('Insufficient funds');
        }
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->account_number;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * @param $account_number
     *
     * @return mixed|void
     */
    public function setAccountNumber($account_number)
    {
        $this->account_number = $account_number;
    }

    /**
     * @return mixed
     */
    public abstract function calculateAllowedBalance();

    /**
     * setCurrentBalance
     */
    public abstract function setCurrentBalance();

    /**
     * @return mixed
     */
    public function getCurrentBalance()
    {
        return $this->current_balance;
    }

    /**
     * @param $account_number
     * @param $type
     * @param $transaction_amount
     *
     * @throws \Exception
     */
    protected function initTransaction($account_number, $type, $transaction_amount)
    {
        $this->setAccountNumber($account_number);
        $this->setActionType($type);
        $this->setAmount($transaction_amount);
    }

    public function getTransactions($from, $to, $account_number)
    {
        try {
            return BankTransactionsRepository::searchTransactions($from, $to, $account_number);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateAccountBalance($id, $data)
    {
        try {
            return BankTransactionsRepository::update($id, $data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * save transaction data
     */
    public function commit()
    {
        $this->transaction_repository->create([
            'account_number' => $this->account_number,
            'amount' => $this->amount,
            'action_type' => $this->action_type,
            'current_balance' => $this->current_balance,
        ]);
    }
}
