<?php

namespace App\Http\Dto\Transfers;

use App\Http\Dto\Dto;

final class TransferDto extends Dto
{

    /**
     * The transfer sender.
     * @var integer|string
     */
    public $payer_id;

    /**
     * The transfer receiver
     * @var integer|string
     */
    public $payee_id;

    /**
     * The transfer amount
     * @var float|integer|string
     */
    public $amount;

    /**
     * The transfer description
     * @var string
     */
    public string $description;

}