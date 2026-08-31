<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ActivityType extends Enum {
    public const SIGNIN = "signin";
    public const USER = "user";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
    public const SERVICE_PRINCIPAL = "servicePrincipal";
}
