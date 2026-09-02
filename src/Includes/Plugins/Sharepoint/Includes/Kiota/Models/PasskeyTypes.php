<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PasskeyTypes extends Enum {
    public const DEVICE_BOUND = "deviceBound";
    public const SYNCED = "synced";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
