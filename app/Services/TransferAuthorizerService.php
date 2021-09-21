<?php

namespace App\Services;

use Exception;
use App\Enums\TransferAuthorization;
use Illuminate\Support\Facades\Http;

class TransferAuthorizerService extends Service
{

    private string $endpoint;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->endpoint = config('services.transfers.authorization');
    }

    /**
     * Execute the service.
     * @return bool
     * @throws Exception
     */
    public function authorize(): bool
    {

        $response = Http::get($this->endpoint);

        if($response->successful())
        {
            throw new Exception("The authorization service is offline.");
        }

        return $response->json("message") === TransferAuthorization::Accepted;

    }

}