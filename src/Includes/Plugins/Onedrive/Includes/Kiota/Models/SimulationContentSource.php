<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SimulationContentSource extends Enum {
    public const UNKNOWN = "unknown";
    public const GLOBAL = "global";
    public const TENANT = "tenant";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
