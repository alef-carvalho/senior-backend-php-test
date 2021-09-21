<?php

namespace App\Jobs\Dispatchers;

use App\Jobs\Job;
use App\Models\Transfer;
use App\Enums\TransferStatus;
use App\Repositories\TransferRepository;
use App\Jobs\Transfers\ExecuteAuthorizedTransfer;

class DispatchAuthorizedTransfers extends Job
{

    private TransferRepository $repository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repository = new TransferRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->enqueue();
    }

    /**
     * Enqueue each authorized transfer in a job.
     * @return void
     */
    private function enqueue()
    {

        $transfers = $this->repository->findByStatus(TransferStatus::Authorized);

        $transfers->map(function (Transfer $transfer)
        {
            ExecuteAuthorizedTransfer::dispatch($transfer);
        });

    }

}
