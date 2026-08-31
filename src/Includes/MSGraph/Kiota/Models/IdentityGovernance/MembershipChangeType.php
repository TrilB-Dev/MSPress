<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Enum;

class MembershipChangeType extends Enum {
    public const ADD = "add";
    public const REMOVE = "remove";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
