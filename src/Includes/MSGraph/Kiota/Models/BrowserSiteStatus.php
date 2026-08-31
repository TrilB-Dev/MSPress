<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class BrowserSiteStatus extends Enum {
    public const PUBLISHED = "published";
    public const PENDING_ADD = "pendingAdd";
    public const PENDING_EDIT = "pendingEdit";
    public const PENDING_DELETE = "pendingDelete";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
