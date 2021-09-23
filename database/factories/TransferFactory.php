<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transfer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $payer = Customer::factory()->pf()->create();
        $payee = Customer::factory()->pj()->create();

        return [
            "payer_id"    => $payer->cpf_cnpj,
            "payee_id"    => $payee->cpf_cnpj,
            "amount"      => 100,
            "description" => "Testing"
        ];

    }

    public function toPF()
    {
        //
    }

    public function toPJ()
    {
        //
    }

}
