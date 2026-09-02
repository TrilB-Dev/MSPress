<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MultiFactorAuthConfiguration extends Enum {
    public const NOT_REQUIRED = "notRequired";
    public const REQUIRED = "required";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
