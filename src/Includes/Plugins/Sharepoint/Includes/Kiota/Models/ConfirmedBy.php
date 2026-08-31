<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ConfirmedBy extends Enum {
    public const NONE = "none";
    public const USER = "user";
    public const MANAGER = "manager";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
