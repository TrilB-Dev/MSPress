<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class FileStorageContainerBillingStatus extends Enum {
    public const INVALID = "invalid";
    public const VALID = "valid";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
