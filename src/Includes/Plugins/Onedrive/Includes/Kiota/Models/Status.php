<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Status extends Enum {
    public const ACTIVE = "active";
    public const UPDATED = "updated";
    public const DELETED = "deleted";
    public const IGNORED = "ignored";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
