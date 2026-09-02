<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CrossTenantAccessPolicyTargetType extends Enum {
    public const USER = "user";
    public const GROUP = "group";
    public const APPLICATION = "application";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
