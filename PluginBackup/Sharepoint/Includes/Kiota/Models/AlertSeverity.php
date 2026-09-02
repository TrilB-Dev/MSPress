<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AlertSeverity extends Enum {
    public const UNKNOWN = "unknown";
    public const INFORMATIONAL = "informational";
    public const LOW = "low";
    public const MEDIUM = "medium";
    public const HIGH = "high";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
