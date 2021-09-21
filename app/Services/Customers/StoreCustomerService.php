<?php

namespace App\Services\Customers;

use App\Models\Customer;
use App\Services\Service;
use App\Repositories\CustomerRepository;

class StoreCustomerService extends Service
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

}