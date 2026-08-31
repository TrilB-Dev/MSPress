<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ManagedDeviceOwnerType extends Enum {
    public const UNKNOWN = "unknown";
    public const COMPANY = "company";
    public const PERSONAL = "personal";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
