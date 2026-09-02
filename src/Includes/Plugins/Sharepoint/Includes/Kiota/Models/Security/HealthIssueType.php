<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class HealthIssueType extends Enum {
    public const SENSOR = "sensor";
    public const GLOBAL = "global";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
