<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WorkLocationSource extends Enum {
    public const NONE = "none";
    public const MANUAL = "manual";
    public const SCHEDULED = "scheduled";
    public const AUTOMATIC = "automatic";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
