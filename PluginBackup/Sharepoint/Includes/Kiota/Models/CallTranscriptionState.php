<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CallTranscriptionState extends Enum {
    public const NOT_STARTED = "notStarted";
    public const ACTIVE = "active";
    public const INACTIVE = "inactive";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
