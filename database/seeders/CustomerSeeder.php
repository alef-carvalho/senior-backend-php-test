<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Enums\CustomerType;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Customer::query()->firstOrCreate([
            "email"     => "customer.pf@test.com",
            "cpf_cnpj"  => "748.821.040-91"
        ], [
            "full_name" => "Fake Person",
            "balance"   => 1000,
            "type"      => CustomerType::PF
        ]);

        Customer::query()->firstOrCreate([
            "email"     => "customer.pj@test.com",
            "cpf_cnpj"  => "63.398.241/0001-50"
        ], [
            "full_name" => "Fake Company",
            "type"      => CustomerType::PJ
        ]);

    }

}
