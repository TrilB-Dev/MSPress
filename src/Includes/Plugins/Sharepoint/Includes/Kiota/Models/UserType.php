<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class UserType extends Enum {
    public const MEMBER = "member";
    public const GUEST = "guest";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
