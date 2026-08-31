<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CloudPcProvisioningType extends Enum {
    public const DEDICATED = "dedicated";
    public const SHARED = "shared";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
