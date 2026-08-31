<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsSettingType extends Enum {
    public const ROAMING = "roaming";
    public const BACKUP = "backup";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
