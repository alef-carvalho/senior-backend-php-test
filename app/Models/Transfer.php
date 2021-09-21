<?php

namespace App\Models;

use App\Enums\TransferStatus;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Customer $payer
 * @property Customer $payee
 * @property TransferStatus $status
 */
class Transfer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "payer_id",
        "payee_id",
        "amount"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        "status" => TransferStatus::class
    ];

    /**
     * Returns the sender of transaction.
     * @return BelongsTo
     */
    public function payer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Returns the receiver of transaction.
     * @return BelongsTo
     */
    public function payee(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Returns transaction logs.
     * @return HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(TransferLog::class)->orderBy("created_at");
    }

    //checkers

    /**
     * Returns true when transfer status is pending
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->status->is(TransferStatus::Pending);
    }

    /**
     * Returns true when transfer status equals "authorized"
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return $this->status->is(TransferStatus::Authorized);
    }

    /**
     * Returns true when transfer status equals "rejected"
     * @return bool
     */
    public function isRejected(): bool
    {
        return $this->status->is(TransferStatus::Rejected);
    }

    /**
     * Returns true when transfer status equals "reverted"
     * @return bool
     */
    public function isReverted(): bool
    {
        return $this->status->is(TransferStatus::Reverted);
    }

    /**
     * Returns true when transfer status equals "transferred"
     * @return bool
     */
    public function isTransferred(): bool
    {
        return $this->status->is(TransferStatus::Transferred);
    }

}
