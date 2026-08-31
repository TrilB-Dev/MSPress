<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SignInUserType extends Enum {
    public const MEMBER = "member";
    public const GUEST = "guest";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
