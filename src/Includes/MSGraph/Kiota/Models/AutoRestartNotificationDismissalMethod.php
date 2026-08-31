<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AutoRestartNotificationDismissalMethod extends Enum {
    public const NOT_CONFIGURED = "notConfigured";
    public const AUTOMATIC = "automatic";
    public const USER = "user";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
