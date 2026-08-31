<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class HoldType extends Enum {
    public const NONE = "none";
    public const PRIVATE = "private";
    public const PUBLIC = "public";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
