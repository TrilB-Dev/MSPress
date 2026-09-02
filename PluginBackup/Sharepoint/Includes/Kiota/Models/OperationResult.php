<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OperationResult extends Enum {
    public const SUCCESS = "success";
    public const FAILURE = "failure";
    public const TIMEOUT = "timeout";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
