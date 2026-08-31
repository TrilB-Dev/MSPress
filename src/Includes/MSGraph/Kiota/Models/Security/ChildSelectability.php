<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class ChildSelectability extends Enum {
    public const ONE = "One";
    public const MANY = "Many";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
