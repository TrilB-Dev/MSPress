<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationMethodState extends Enum {
    public const ENABLED = "enabled";
    public const DISABLED = "disabled";
}
