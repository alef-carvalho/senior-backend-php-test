<?php

namespace App\Services;

use Exception;
use App\Enums\TransferAuthorization;
use Illuminate\Support\Facades\Http;
use App\Http\Dto\Transfers\TransferDto;

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
     * @param TransferDto $dto
     * @return bool
     * @throws Exception
     */
    public function authorize(TransferDto $dto): bool
    {

        $response = Http::post($this->endpoint, $dto->toArray());

        if(!$response->successful())
        {
            throw new Exception("The authorization service is offline.");
        }

        return $response->json("message") === TransferAuthorization::Accepted;

    }

}