<?php

namespace App\Services\User;

use App\Repositories\CustomerRepository;

class Customer
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $address;

    /**
     * @var CustomerRepository
     */
    private $customer_repository;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->customer_repository = new CustomerRepository();
    }

    /**
     * @param $customer_name
     * @param $customer_address
     * @param $customer_nic
     * @param $customer_mobile_number
     *
     * @return string
     */
    public static function create($customer_name, $customer_address, $customer_nic, $customer_mobile_number)
    {
        $customer = new Customer();
        $customer->setData($customer_name, $customer_address, $customer_nic, $customer_mobile_number);
        return $customer->saveCustomerData();
    }

    /**
     * @param $customer_name
     * @param $customer_address
     * @param $customer_nic
     * @param $customer_mobile_number
     */
    private function setData($customer_name, $customer_address, $customer_nic, $customer_mobile_number) {
        $this->setName($customer_name);
        $this->setAddress($customer_address);
        $this->setNic($customer_nic);
        $this->setMobile($customer_mobile_number);
    }

    /**
     * saveCustomerData
     */
    public function saveCustomerData()
    {
        return $this->customer_repository->create([
            'full_name' => $this->name,
            'address' => $this->address,
            'nic' => $this->nic,
            'mobile' => $this->mobile,
        ]);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param $address
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param $address
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
}