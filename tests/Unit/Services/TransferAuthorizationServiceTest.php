<?php

namespace Tests\Unit\Services;

use Database\Factories\CustomerFactory;
use Tests\TestCase;
use App\Http\Dto\Transfers\TransferDto;
use App\Services\Transfers\AuthorizeTransferService;

class TransferAuthorizationServiceTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_is_authorization_service_online()
    {

        //arrange
        $service  = new AuthorizeTransferService();
        $transfer = new TransferDto([
            "payer_id"    => CustomerFactory::CPF,
            "payee_id"    => CustomerFactory::CNPJ,
            "amount"      => 100,
            "description" => "Testing"
        ]);

        $result = $service->authorize($transfer);

        //assert
        $this->assertEquals(true, $result);

    }

}
