<?php

namespace App\Enums;

/**
 * The allowed customer types.
 * @todo replace with native php 8.1 enums
 */
final class TransferStatus extends Enum
{
    const Pending     = "pending";
    const Authorized  = "authorized";
    const Rejected    = "rejected";
    const Reverted    = "reverted";
    const Transferred = "transferred";
}