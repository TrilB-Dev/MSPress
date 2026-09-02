<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ConditionalAccessInsiderRiskLevels extends Enum {
    public const MINOR = "minor";
    public const MODERATE = "moderate";
    public const ELEVATED = "elevated";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
