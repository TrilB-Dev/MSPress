<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EngagementCreationMode extends Enum {
    public const NONE = "none";
    public const MIGRATION = "migration";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
