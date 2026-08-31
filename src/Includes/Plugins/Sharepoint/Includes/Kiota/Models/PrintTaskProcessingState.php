<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PrintTaskProcessingState extends Enum {
    public const PENDING = "pending";
    public const PROCESSING = "processing";
    public const COMPLETED = "completed";
    public const ABORTED = "aborted";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
