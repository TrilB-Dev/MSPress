<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class TeamsAppResourceSpecificPermissionType extends Enum {
    public const DELEGATED = "delegated";
    public const APPLICATION = "application";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
