<?php

namespace App\Services\Account;

interface AccountContract
{
    /**
     * @return mixed
     */
    public function getAccountBalance();

    /***
     * @param $balance
     *
     * @return mixed
     */
    public function setAccountBalance($balance);

    /**
     * @return mixed
     */
    public function generateAccountNumber();

    /**
     * @return mixed
     */
    public function setCustomer($customer);

    /**
     * @return mixed
     */
    public function getCustomer();

    /**
     * @return mixed
     */
    public function setBranch($branch);

    /**
     * @return mixed
     */
    public function getBranch();

    /**
     * @return mixed
     */
    public function setInterest($interest);
}