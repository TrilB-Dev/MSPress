<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MobileThreatPartnerTenantState extends Enum {
    public const UNAVAILABLE = "unavailable";
    public const AVAILABLE = "available";
    public const ENABLED = "enabled";
    public const UNRESPONSIVE = "unresponsive";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
