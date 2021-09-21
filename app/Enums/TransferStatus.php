<?php

namespace App\Enums;

/**
 * The allowed customer types.
 * @todo replace with native php 8.1 enums
 */
final class TransferStatus extends Enum
{
    const Pending  = "pending";
    const Reverted = "reverted";
}