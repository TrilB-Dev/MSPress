<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class LabelActionSource extends Enum {
    public const MANUAL = "manual";
    public const AUTOMATIC = "automatic";
    public const RECOMMENDED = "recommended";
    public const NONE = "none";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
