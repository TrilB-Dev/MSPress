<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ImportedWindowsAutopilotDeviceIdentityUploadStatus extends Enum {
    public const NO_UPLOAD = "noUpload";
    public const PENDING = "pending";
    public const COMPLETE = "complete";
    public const ERROR = "error";
}
