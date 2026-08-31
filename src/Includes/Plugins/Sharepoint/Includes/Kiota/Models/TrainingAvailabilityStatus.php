<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class TrainingAvailabilityStatus extends Enum {
    public const UNKNOWN = "unknown";
    public const NOT_AVAILABLE = "notAvailable";
    public const AVAILABLE = "available";
    public const ARCHIVE = "archive";
    public const DELETE = "delete";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
