<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MonitorStatus extends Enum {
    public const ACTIVE = "active";
    public const INACTIVE = "inactive";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
