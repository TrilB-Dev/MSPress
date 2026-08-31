<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationStrengthRequirements extends Enum {
    public const NONE = "none";
    public const MFA = "mfa";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
