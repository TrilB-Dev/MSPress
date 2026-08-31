<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationMethodKeyStrength extends Enum {
    public const NORMAL = "normal";
    public const WEAK = "weak";
    public const UNKNOWN = "unknown";
}
