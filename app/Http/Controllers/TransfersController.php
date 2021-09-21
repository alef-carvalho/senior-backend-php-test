<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Transfer;
use Illuminate\Http\JsonResponse;
use App\Http\Dto\Transfers\TransferDto;
use App\Services\Transfers\SendTransferService;
use App\Http\Requests\Transfers\StoreTransferFormRequest;

class TransfersController extends Controller
{

    /**
     * Retrieve the transfer details.
     * todo add dto.
     * @param Transfer $transfer
     * @return JsonResponse
     */
    public function show(Transfer $transfer): JsonResponse
    {
        return $this->json($transfer);
    }

    /**
     * Store a new transfer in database.
     *
     * @param StoreTransferFormRequest $request
     * @return JsonResponse
     */
    public function store(StoreTransferFormRequest $request): JsonResponse
    {

        $service = new SendTransferService(
            new TransferDto($request->validated())
        );

        try {

            $transfer = $service->send();

            return $this->json(
                $transfer
            );

        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }

    }

}