<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationStrengthRequirements extends Enum {
    public const NONE = "none";
    public const MFA = "mfa";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
