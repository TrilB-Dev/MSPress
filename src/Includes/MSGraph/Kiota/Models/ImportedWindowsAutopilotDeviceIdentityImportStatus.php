<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ImportedWindowsAutopilotDeviceIdentityImportStatus extends Enum {
    public const UNKNOWN = "unknown";
    public const PENDING = "pending";
    public const PARTIAL = "partial";
    public const COMPLETE = "complete";
    public const ERROR = "error";
}
