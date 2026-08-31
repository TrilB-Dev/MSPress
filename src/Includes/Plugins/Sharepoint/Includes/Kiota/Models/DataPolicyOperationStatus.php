<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DataPolicyOperationStatus extends Enum {
    public const NOT_STARTED = "notStarted";
    public const RUNNING = "running";
    public const COMPLETE = "complete";
    public const FAILED = "failed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
