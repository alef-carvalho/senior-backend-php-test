<?php

namespace App\Services\Transfers;

use App\Models\Transfer;
use App\Services\Service;

class ReceiveTransferService extends Service
{

    private Transfer $transfer;

    /**
     * Constructor
     */
    public function __construct(Transfer $transfer)
    {
        $this->transfer = $transfer;
    }

    /**
     * Execute the service.
     * @return void
     */
    public function execute(): void
    {
        $this->increasePayeeBalance();
        $this->finishTransfer();
    }

    /**
     * Add transfer amount to payee balance.
     * @return void
     */
    private function increasePayeeBalance(): void
    {
        $this->transfer->payee->setBalance($this->getNewPayeeBalance());
        $this->transfer->payee->save();
    }

    /**
     * Discounts the transaction amount from payer balance.
     * @return void
     */
    private function getNewPayeeBalance(): float
    {
        return $this->transfer->payee->balance + $this->transfer->amount;
    }

    /**
     * Discounts the transaction amount from payer balance.
     * @return void
     */
    private function finishTransfer(): void
    {
        $this->transfer->setAsTransferred();
        $this->transfer->save();
    }

}