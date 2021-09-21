<?php

namespace Tests\Unit\Services;

use App\Services\TransferAuthorizerService;
use PHPUnit\Framework\TestCase;

class TransferAuthorizationTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_authorization_service_is_online()
    {

        //arrange
        $service = new TransferAuthorizerService();

        $result = $service->authorize();

        //assert
        $this->assertEquals(true, $result);

    }

}
