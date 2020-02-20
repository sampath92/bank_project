<?php

namespace App\Http\Controllers;

use App\Services\User\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @param Request $request
     *
     * @return string
     */
    public function createNewCustomer(Request $request)
    {

        $request->validate([
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_nic' => 'required',
            'customer_mobile_number' => 'required',
        ]);

        try {

            $customer_name = $request->input('customer_name');
            $customer_address = $request->input('customer_address');
            $nic = $request->input('customer_nic');
            $mobile = $request->input('customer_mobile_number');

            return Customer::create($customer_name, $customer_address, $nic, $mobile);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateCustomer($id, $data)
    {

    }

    public function deleteCustomer()
    {

    }

    public function getCustomer()
    {

    }
}
