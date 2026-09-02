<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CloudPcDeviceImageOsStatus extends Enum {
    public const SUPPORTED = "supported";
    public const SUPPORTED_WITH_WARNING = "supportedWithWarning";
    public const UNKNOWN = "unknown";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
