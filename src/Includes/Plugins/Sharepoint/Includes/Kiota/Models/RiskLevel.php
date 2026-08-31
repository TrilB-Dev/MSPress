<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RiskLevel extends Enum {
    public const LOW = "low";
    public const MEDIUM = "medium";
    public const HIGH = "high";
    public const HIDDEN = "hidden";
    public const NONE = "none";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
