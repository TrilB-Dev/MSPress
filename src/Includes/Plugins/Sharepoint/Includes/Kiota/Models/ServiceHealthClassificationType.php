<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ServiceHealthClassificationType extends Enum {
    public const ADVISORY = "advisory";
    public const INCIDENT = "incident";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
