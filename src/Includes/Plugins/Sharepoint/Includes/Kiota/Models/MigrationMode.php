<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MigrationMode extends Enum {
    public const IN_PROGRESS = "inProgress";
    public const COMPLETED = "completed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
