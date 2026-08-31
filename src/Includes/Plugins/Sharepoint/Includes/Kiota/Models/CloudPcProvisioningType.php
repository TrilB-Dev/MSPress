<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CloudPcProvisioningType extends Enum {
    public const DEDICATED = "dedicated";
    public const SHARED = "shared";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
