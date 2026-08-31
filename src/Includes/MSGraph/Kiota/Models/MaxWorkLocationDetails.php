<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MaxWorkLocationDetails extends Enum {
    public const UNKNOWN = "unknown";
    public const NONE = "none";
    public const APPROXIMATE = "approximate";
    public const SPECIFIC = "specific";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
