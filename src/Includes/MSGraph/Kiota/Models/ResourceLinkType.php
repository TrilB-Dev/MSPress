<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ResourceLinkType extends Enum {
    public const URL = "url";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
