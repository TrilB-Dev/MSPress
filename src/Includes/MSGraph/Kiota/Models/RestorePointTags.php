<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RestorePointTags extends Enum {
    public const NONE = "none";
    public const FAST_RESTORE = "fastRestore";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
