<?php

namespace App\Services\Transaction;

interface TransactionContract
{
    /**
     * @param $account_number
     *
     * @return mixed
     */
    public function setAccountNumber($account_number);

    /**
     * @return mixed
     */
    public function getAccountNumber();

    /**
     * @param $amount
     *
     * @return mixed
     */
    public function setAmount($amount);

    /**
     * @return mixed
     */
    public function getAmount();


    /**
     * @param $type
     *
     * @return mixed
     */
    public function setActionType($type);

    /**
     * @return mixed
     */
    public function getActionType();
}