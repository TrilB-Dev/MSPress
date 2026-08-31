<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CheckInMethod extends Enum {
    public const UNSPECIFIED = "unspecified";
    public const MANUAL = "manual";
    public const INFERRED = "inferred";
    public const VERIFIED = "verified";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
