<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class InitiatorType extends Enum {
    public const USER = "user";
    public const APPLICATION = "application";
    public const SYSTEM = "system";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
