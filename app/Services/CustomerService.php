<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerService extends Service
{

    private CustomerRepository $repository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->repository = new CustomerRepository();
    }

    /**
     * Store customer in database.
     * @param array $attributes
     * @return Customer
     */
    public function create(array $attributes): Customer
    {
        return $this->repository->create($attributes);
    }

    /**
     * Update customer in database.
     * @param Customer $customer
     * @param array $attributes
     * @return bool
     */
    public function update(Customer $customer, array $attributes): bool
    {
        return $this->repository->update($customer->id, $attributes);
    }

}