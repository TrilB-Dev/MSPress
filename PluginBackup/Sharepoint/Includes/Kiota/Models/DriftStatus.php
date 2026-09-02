<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DriftStatus extends Enum {
    public const ACTIVE = "active";
    public const FIXED = "fixed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
