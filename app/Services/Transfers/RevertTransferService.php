<?php

namespace App\Services\Transfers;

use App\Models\Transfer;
use App\Services\Service;

class RevertTransferService extends Service
{

    private Transfer $transfer;

    /**
     * Constructor
     */
    public function __construct(Transfer $transfer)
    {
        $this->transfer = $transfer->fresh();
    }

    /**
     * Execute the service.
     * @return void
     */
    public function execute(): void
    {
        $this->decreasePayeeBalance();
        $this->finishTransfer();
    }

    /**
     * Remove the transfer amount to payee balance.
     * @return void
     */
    private function decreasePayeeBalance(): void
    {
        $this->transfer->payee->setBalance($this->getNewPayeeBalance());
        $this->transfer->payee->save();
    }

    /**
     * Remove the transaction amount from payer balance.
     * @return void
     */
    private function getNewPayeeBalance(): float
    {
        return $this->transfer->payee->balance - $this->transfer->amount;
    }

    /**
     * Discounts the transaction amount from payer balance.
     * @return void
     */
    private function finishTransfer(): void
    {
        $this->transfer->setAsReverted();
        $this->transfer->save();
    }

}