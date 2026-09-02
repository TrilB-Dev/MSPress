<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WorkbookOperationStatus extends Enum {
    public const NOT_STARTED = "notStarted";
    public const RUNNING = "running";
    public const SUCCEEDED = "succeeded";
    public const FAILED = "failed";
}
