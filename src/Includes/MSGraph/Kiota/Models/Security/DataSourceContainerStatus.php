<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class DataSourceContainerStatus extends Enum {
    public const ACTIVE = "active";
    public const RELEASED = "released";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
