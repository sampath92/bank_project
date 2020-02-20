<?php

namespace App\Repositories;

use App\Models\BankTransactionModel;

class BankTransactionsRepository
{
    /**
     * @param $data
     *
     * @return string
     */
    public function create($data)
    {
        try {
            return BankTransactionModel::create([$data]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @param $data
     *
     * @return string
     */
    public function update($id, $data)
    {
        try {
            return BankTransactionModel::find($id)->update($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function read($id)
    {
        try {
            return BankTransactionModel::find($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * @param $from
     * @param $to
     * @param $ano
     *
     * @return string
     */
    public function searchTransactions($from, $to, $ano)
    {
        try {
            return TransactionModel::where()->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}