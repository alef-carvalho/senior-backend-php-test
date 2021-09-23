<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{

    const CPF  = 224_941_800_40;
    const CNPJ = 82_911_279_0001_20;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "balance"   => 1000,
            "full_name" => $this->faker->name(),
            "email"     => $this->faker->email(),
            "type"      => CustomerType::PF
        ];
    }

    public function pf(): CustomerFactory
    {
        return $this->state(function (array $attributes) {
            return [
                "cpf_cnpj" => self::CPF,
                "type"     => CustomerType::PF
            ];
        });
    }

    public function pj(): CustomerFactory
    {
        return $this->state(function (array $attributes) {
            return [
                "cpf_cnpj" => self::CNPJ,
                "type"     => CustomerType::PJ
            ];
        });
    }

}
