<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsUserType extends Enum {
    public const ADMINISTRATOR = "administrator";
    public const STANDARD = "standard";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
