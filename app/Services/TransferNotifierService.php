<?php

namespace App\Services;

use Exception;
use App\Enums\TransferNotification;
use Illuminate\Support\Facades\Http;

class TransferNotifierService extends Service
{

    private string $endpoint;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->endpoint = config('services.transfers.notification');
    }

    /**
     * Execute the service.
     * @return bool
     * @throws Exception
     */
    public function notify(): bool
    {

        $response = Http::get($this->endpoint);

        if(!$response->successful())
        {
            throw new Exception("The notification service is offline.");
        }

        return $response->json("message") === TransferNotification::Success;

    }

}