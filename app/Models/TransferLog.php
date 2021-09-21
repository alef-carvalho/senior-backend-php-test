<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransferLog extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "transfer_id",
        "description"
    ];

    /**
     * Returns the parent transfer.
     * @return BelongsTo
     */
    public function transfer(): BelongsTo
    {
        return $this->belongsTo(Transfer::class);
    }

}
