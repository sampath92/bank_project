<?php

namespace App\Repositories;

use App\Models\BankAccountModel;

/**
 * Class BankAccountsRepository
 * @package App\Repositories
 */
class BankAccountsRepository
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public function create($data)
    {
        try {
            return BankAccountModel::create($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $ano
     * @param $data
     *
     * @return mixed
     */
    public function update($ano, $data)
    {
        return AccountModel::where('account_number', $ano)->update($data);
    }

    /**
     * @param $ano
     *
     * @return mixed
     */
    public function read($ano)
    {
        return AccountModel::where('account_number', $ano)->first();
    }

    /**
     * @param $ano
     *
     * @return int
     */
    public function delete($ano)
    {
        return AccountModel::destroy($ano);
    }

    public function softDelete()
    {
        
    }
}