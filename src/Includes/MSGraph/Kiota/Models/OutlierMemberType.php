<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OutlierMemberType extends Enum {
    public const USER = "user";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
