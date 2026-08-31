<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class GroupAccessType extends Enum {
    public const NONE = "none";
    public const PRIVATE = "private";
    public const SECRET = "secret";
    public const PUBLIC = "public";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
