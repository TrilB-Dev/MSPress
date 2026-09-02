<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class IoTDeviceImportanceType extends Enum {
    public const UNKNOWN = "unknown";
    public const LOW = "low";
    public const NORMAL = "normal";
    public const HIGH = "high";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
