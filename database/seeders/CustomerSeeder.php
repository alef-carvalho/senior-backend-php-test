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
            "cpf_cnpj"  => "518.283.740-24"
        ], [
            "full_name" => "Fake PF Customer",
            "balance"   => 1000,
            "type"      => CustomerType::PF
        ]);

        Customer::query()->firstOrCreate([
            "email"     => "customer.pj@test.com",
            "cpf_cnpj"  => "17.576.739/0001-49",
        ], [
            "full_name" => "Fake PJ Customer",
            "balance"   => 1000,
            "type"      => CustomerType::PJ
        ]);

    }

}
