<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsDeviceUsageType extends Enum {
    public const SINGLE_USER = "singleUser";
    public const SHARED = "shared";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
