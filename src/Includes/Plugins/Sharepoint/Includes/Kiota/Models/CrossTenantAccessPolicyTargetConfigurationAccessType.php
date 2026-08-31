<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CrossTenantAccessPolicyTargetConfigurationAccessType extends Enum {
    public const ALLOWED = "allowed";
    public const BLOCKED = "blocked";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
