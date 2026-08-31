<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SubjectRightsRequestStatus extends Enum {
    public const ACTIVE = "active";
    public const CLOSED = "closed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
