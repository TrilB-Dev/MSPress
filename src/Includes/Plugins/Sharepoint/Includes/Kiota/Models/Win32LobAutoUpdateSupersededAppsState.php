<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Win32LobAutoUpdateSupersededAppsState extends Enum {
    public const NOT_CONFIGURED = "notConfigured";
    public const ENABLED = "enabled";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
