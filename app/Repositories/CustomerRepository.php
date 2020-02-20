<?php

namespace App\Repositories;

use App\Models\CustomerModel;

class CustomerRepository
{
    /**
     * @param $data
     * @return string
     */
    public function create($data)
    {
        try {
            CustomerModel::create([$data]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @param $data
     * @return string
     */
    public function update($id, $data)
    {
        try {
            CustomerModel::find($id)->update($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}