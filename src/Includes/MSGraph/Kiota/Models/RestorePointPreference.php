<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RestorePointPreference extends Enum {
    public const LATEST = "latest";
    public const OLDEST = "oldest";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
