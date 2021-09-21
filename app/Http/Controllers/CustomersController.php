<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use App\Services\Customers\StoreCustomerService;
use App\Services\Customers\UpdateCustomerService;
use App\Http\Requests\Customers\UpdateCustomerFormRequest;
use App\Http\Requests\Customers\StoreCustomerFormRequest;

class CustomersController extends Controller
{

    /**
     * Retrieve the customer data.
     * @param Customer $customer
     * @return JsonResponse
     */
    public function show(Customer $customer): JsonResponse
    {
        return $this->json($customer);
    }

    /**
     * Store a new customer in database.
     *
     * @param StoreCustomerFormRequest $request
     * @param StoreCustomerService $service
     * @return JsonResponse
     */
    public function store(StoreCustomerFormRequest $request, StoreCustomerService $service): JsonResponse
    {

        try {

            $service->create($request->validated());

            return $this->success(
                "Customer successfully registered."
            );

        } catch (Exception $e)
        {
            return $this->error("Error creating customer.");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Customer $customer
     * @param UpdateCustomerService $service
     * @param UpdateCustomerFormRequest $request
     * @return JsonResponse
     */
    public function update(Customer $customer, UpdateCustomerService $service, UpdateCustomerFormRequest $request): JsonResponse
    {

        try {

            $service->update($customer, $request->validated());

            return $this->success(
                "Customer successfully updated."
            );

        } catch (Exception $e)
        {
            return $this->error("Error updating customer.");
        }

    }

    /**
     * Remove the customer from database.
     *
     * @param Customer $customer
     * @param StoreCustomerService $service
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Customer $customer, StoreCustomerService $service): JsonResponse
    {
        throw new Exception("Not implemented.");
    }

}