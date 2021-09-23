<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use App\Services\Transfers\NotifyTransferService;

class TransferNotificationServiceTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_is_notification_service_online()
    {

        //arrange
        $service = new NotifyTransferService();
        $result = $service->notify();

        //assert
        $this->assertEquals(true, $result);

    }

}
