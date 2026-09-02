<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class DefenderAvStatus extends Enum {
    public const NOT_REPORTING = "notReporting";
    public const DISABLED = "disabled";
    public const NOT_UPDATED = "notUpdated";
    public const UPDATED = "updated";
    public const UNKNOWN = "unknown";
    public const NOT_SUPPORTED = "notSupported";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
