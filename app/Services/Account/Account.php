<?php

namespace App\Services\Account;

use App\Repositories\BankTransactionsRepository;
use App\Repositories\BankAccountsRepository;

abstract class Account implements AccountContract
{
    /**
     * @var
     */
    protected $type;
    /**
     * @var float
     */
    protected $balance = 0.00;

    /**
     * @var float
     */
    protected $interest = 0.00;

    /**
     * @var float
     */
    protected $interest_rate = 0.00;

    /**
     * @var int
     */
    protected $account_number;

    /**
     * @var int
     */
    protected $branch_id;

    /**
     * @var int
     */
    protected $customer_id;

    /**
     * @var BankAccountsRepository
     */
    protected $accounts_repository;

    /**
     * @var BankAccountsRepository
     */
    protected $transactions_repository;

    /**
     * @var int
     */
    protected $od_limit = 0;

    /**
     * Account constructor.
     */
    public function __construct()
    {
        $this->accounts_repository = new BankAccountsRepository();
        $this->transactions_repository = new BankTransactionsRepository();
    }

    /**
     * save changes to the account
     */
    public function save()
    {

        $this->accounts_repository->create([
            'type' => $this->type,
            'account_number' => $this->account_number,
            'customer_id' => $this->customer_id,
            'branch_id' => $this->branch_id,
            'balance' => $this->balance
        ]);
    }

    /**
     * update account records
     */
    public function update()
    {
        $this->accounts_repository->update($this->account_number,[
            'type' => $this->type,
            'customer_id' => $this->customer_id,
            'branch_id' => $this->branch_id,
            'balance' => $this->balance
        ]);
    }

    /**
     * deactivate account
     */
    public function deactivateBankAccount()
    {
        $this->accounts_repository->update($this->account_number,[
            'is_active' => 0
        ]);
    }

    /**
     * @return int
     */
    public function getCustomer()
    {
        return $this->customer_id;
    }
    /**
     * @param $customer
     * @return null
     */
    public function setCustomer($customer)
    {
        $this->customer_id = $customer;
    }

    /**
     * @param $branch_id
     */
    public function setBranchId($branch_id)
    {
        $this->branch_id = $branch_id;
    }

    /**
     * @return float|mixed
     */
    public function getAccountBalance()
    {
        return $this->balance;
    }

    /**
     * @param $balance
     *
     * @return mixed|void
     */
    public function setAccountBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBranchId()
    {
        return $this->branch_id;
    }

    /**
     * @return mixed
     */
    public abstract function generateAccountNumber();

    /**
     * @return mixed
     */
    public abstract function getAccountDetails($account_number);

    /**
     * calculate interest for a selected month
     */
    public function calculateMonthlyInterest()
    {
        $this->interest = ($this->balance / 100 * $this->interest_rate) / 12;
    }

    /**
     * calculate interest for a selected date
     */
    public function calculateDailyInterest()
    {
        $this->interest = ($this->balance / 100 * $this->interest_rate) / 365;
    }

    /**
     * @param $interest
     *
     * @return mixed|void
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    public function getStatement($from, $to)
    {

    }

}