<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ChatMessagePolicyViolationUserActionTypes extends Enum {
    public const NONE = "none";
    public const OVERRIDE = "override";
    public const REPORT_FALSE_POSITIVE = "reportFalsePositive";
}
