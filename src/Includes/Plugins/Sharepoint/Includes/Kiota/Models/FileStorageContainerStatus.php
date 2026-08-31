<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class FileStorageContainerStatus extends Enum {
    public const INACTIVE = "inactive";
    public const ACTIVE = "active";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
