<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class VerifiedIdUsageConfigurationPurpose extends Enum {
    public const RECOVERY = "recovery";
    public const ONBOARDING = "onboarding";
    public const ALL = "all";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
