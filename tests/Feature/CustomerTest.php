<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_must_register_pf_customer()
    {

        $customer = Customer::factory()->pf()->make();

        $response = $this->post('/api/customers/create', [
            "full_name" => $customer->full_name,
            "email"     => $customer->email,
            "cpf_cnpj"  => $customer->cpf_cnpj,
            "type"      => $customer->type->value
        ]);

        $response->assertStatus(200)->assertJson([
            "message" => "Customer successfully registered."
        ]);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_must_register_pj_customer()
    {

        $customer = Customer::factory()->pj()->make();

        $response = $this->post('/api/customers/create', [
            "full_name" => $customer->full_name,
            "email"     => $customer->email,
            "cpf_cnpj"  => $customer->cpf_cnpj,
            "type"      => $customer->type->value
        ]);

        $response->assertStatus(200)->assertJson([
            "message" => "Customer successfully registered."
        ]);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_must_get_registered_customer()
    {

        $customer = Customer::factory()->pf()->create();

        $response = $this->get("/api/customers/{$customer->cpf_cnpj}");

        $response->assertStatus(200)
            ->assertJson($customer->toArray());

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_must_update_customer()
    {

        $oldCustomer = Customer::factory()->pj()->create();
        $newCustomer = Customer::factory()->pf()->make();

        $response = $this->put("/api/customers/{$oldCustomer->cpf_cnpj}/edit", [
            "full_name" => $newCustomer->full_name,
            "email"     => $newCustomer->email,
            "cpf_cnpj"  => $newCustomer->cpf_cnpj,
            "type"      => $newCustomer->type->value
        ]);

        $response->assertStatus(200)->assertJson([
            "message" => "Customer successfully updated."
        ]);

    }

}
