<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationMethodKeyStrength extends Enum {
    public const NORMAL = "normal";
    public const WEAK = "weak";
    public const UNKNOWN = "unknown";
}
