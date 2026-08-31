<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MeetingAudience extends Enum {
    public const EVERYONE = "everyone";
    public const ORGANIZATION = "organization";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
