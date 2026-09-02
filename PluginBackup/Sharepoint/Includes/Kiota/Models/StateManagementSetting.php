<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class StateManagementSetting extends Enum {
    public const NOT_CONFIGURED = "notConfigured";
    public const BLOCKED = "blocked";
    public const ALLOWED = "allowed";
}
