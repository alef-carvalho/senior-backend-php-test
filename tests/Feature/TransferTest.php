<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransferTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_must_send_transfer()
    {

        $payer = Customer::factory()->pf()->create();
        $payee = Customer::factory()->pj()->create();

        $response = $this->post("/api/transfers/create", [
            "payer_id"    => $payer->cpf_cnpj,
            "payee_id"    => $payee->cpf_cnpj,
            "amount"      => 100,
            "description" => "Testing"
        ]);

        $response->assertStatus(200)->assertJson([
            "payer_id"    => $payer->id,
            "payee_id"    => $payee->id,
            "amount"      => 100,
            "description" => "Testing",
            "status"      => "authorized"
        ]);

    }

}
