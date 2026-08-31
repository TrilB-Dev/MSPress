<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class TrainingType extends Enum {
    public const UNKNOWN = "unknown";
    public const PHISHING = "phishing";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
