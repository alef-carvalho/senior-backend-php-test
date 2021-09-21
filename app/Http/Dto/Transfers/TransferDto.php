<?php

namespace App\Http\Dto\Transfers;

use App\Http\Dto\Dto;

final class TransferDto extends Dto
{

    /**
     * The transfer sender.
     * @var string
     */
    public string $payer_id;

    /**
     * The transfer receiver
     * @var string
     */
    public string $payee_id;

    /**
     * The transfer amount
     * @var float|string
     */
    public $amount;

    /**
     * The transfer description
     * @var string
     */
    public string $description;

}