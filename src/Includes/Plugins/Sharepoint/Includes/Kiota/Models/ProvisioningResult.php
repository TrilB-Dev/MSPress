<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ProvisioningResult extends Enum {
    public const SUCCESS = "success";
    public const FAILURE = "failure";
    public const SKIPPED = "skipped";
    public const WARNING = "warning";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
