<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EmailRole extends Enum {
    public const UNKNOWN = "unknown";
    public const SENDER = "sender";
    public const RECIPIENT = "recipient";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
