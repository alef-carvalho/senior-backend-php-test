<?php

namespace App\Jobs\Transfers;

use Exception;
use App\Jobs\Job;
use App\Models\Transfer;
use App\Services\Transfers\NotifyTransferService;
use App\Services\Transfers\ReceiveTransferService;
use App\Services\Transfers\RevertTransferService;

class ExecuteAuthorizedTransfer extends Job
{

    private ReceiveTransferService $receiveService;
    private RevertTransferService $revertService;
    private NotifyTransferService $notifyService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Transfer $transfer)
    {
        $this->receiveService = new ReceiveTransferService($transfer);
        $this->revertService  = new RevertTransferService($transfer);
        $this->notifyService  = new NotifyTransferService();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->execute();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    private function execute()
    {

        try {

            $this->receiveService->execute();
            $this->notifyService->notify();

        } catch (Exception $e)
        {
            $this->revertService->execute();
        }

    }

}
