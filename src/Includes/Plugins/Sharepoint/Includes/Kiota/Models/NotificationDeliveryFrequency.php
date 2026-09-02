<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class NotificationDeliveryFrequency extends Enum {
    public const UNKNOWN = "unknown";
    public const WEEKLY = "weekly";
    public const BI_WEEKLY = "biWeekly";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
