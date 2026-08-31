<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class VerifiedIdProfileState extends Enum {
    public const ENABLED = "enabled";
    public const DISABLED = "disabled";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
