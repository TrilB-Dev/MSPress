<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OperationStatus extends Enum {
    public const NOT_STARTED = "NotStarted";
    public const RUNNING = "Running";
    public const COMPLETED = "Completed";
    public const FAILED = "Failed";
}
