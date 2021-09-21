<?php

namespace App\Services\Customers;

use App\Models\Customer;
use App\Services\Service;
use App\Repositories\CustomerRepository;

class UpdateCustomerService extends Service
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