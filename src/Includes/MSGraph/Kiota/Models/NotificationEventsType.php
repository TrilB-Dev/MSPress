<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class NotificationEventsType extends Enum {
    public const NONE = "none";
    public const RESTORE_AND_POLICY_UPDATES = "restoreAndPolicyUpdates";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
