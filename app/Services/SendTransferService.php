<?php

namespace App\Services;

use Exception;
use App\Models\Customer;
use App\Models\Transfer;
use App\Http\Dto\Transfers\TransferDto;
use App\Repositories\CustomerRepository;
use App\Repositories\TransferRepository;

class SendTransferService extends Service
{

    private ?Customer $payer;
    private ?Customer $payee;

    private TransferDto $dto;
    private TransferRepository $transferRepository;
    private CustomerRepository $customerRepository;
    private TransferAuthorizerService $authorizerService;
    private TransferNotifierService $notifierService;

    /**
     * Constructor
     */
    public function __construct(TransferDto $dto)
    {
        $this->dto = $dto;
        $this->customerRepository = new CustomerRepository();
        $this->transferRepository = new TransferRepository();
        $this->authorizerService  = new TransferAuthorizerService();
        $this->notifierService = new TransferNotifierService();
    }

    /**
     * Store transfers in database.
     * @return Transfer
     * @throws Exception
     */
    public function send(): Transfer
    {

        $this->validate();
        $this->authorize();
        $this->lockBalance();

        return $this->save();

    }

    /**
     * Validate the elegibility of transaction.
     * @throws Exception
     */
    private function validate(): void
    {

        if(!$this->findPayer())
        {
            throw new Exception("The payer account was not found.");
        }

        if(!$this->findPayee())
        {
            throw new Exception("The payee account was not found.");
        }

        if(!$this->hasElegibility())
        {
            throw new Exception("The payer type is not elegible to send transactions.");
        }

        if(!$this->hasBalance())
        {
            throw new Exception("The payer does not have enough balance to execute the transaction.");
        }

    }

    /**
     * Authorize the transaction with external service.
     * @throws Exception
     */
    private function authorize(): void
    {
        if(!$this->authorizerService->authorize($this->dto))
        {
            throw new Exception("The transaction was not authorized.");
        }
    }

    /**
     * Discounts the transaction amount from payer balance.
     * @return void
     */
    private function lockBalance(): void
    {

        $balance = $this->payer->balance - $this->dto->amount;

        $this->payer->setBalance($balance);
        $this->payer->save();

    }

    /**
     * Store the transaction in database.
     * @return Transfer
     */
    private function save(): Transfer
    {
        return $this->transferRepository->create([
            "payer_id"    => $this->payer->id,
            "payee_id"    => $this->payee->id,
            "amount"      => $this->dto->amount,
            "description" => $this->dto->description
        ]);
    }

    /**
     * Find the sender of transaction.
     */
    private function findPayer()
    {
        return $this->payer = $this->customerRepository->findByCpfOrCnpj($this->dto->payer_id);
    }

    /**
     * Find the receiver of transaction.
     */
    private function findPayee()
    {
        return $this->payee = $this->customerRepository->findByCpfOrCnpj($this->dto->payee_id);
    }

    /**
     * Check if the payer has balance to send the amount of transaction.
     * @return bool
     */
    private function hasBalance(): bool
    {
        return $this->payer->balance >= $this->dto->amount;
    }

    /**
     * Check if the payer is elegible to send the transaction.
     * @return bool
     */
    private function hasElegibility(): bool
    {
        return $this->payer->isPF();
    }

}