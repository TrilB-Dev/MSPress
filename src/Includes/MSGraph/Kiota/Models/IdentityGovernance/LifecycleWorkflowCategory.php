<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Enum;

class LifecycleWorkflowCategory extends Enum {
    public const JOINER = "joiner";
    public const LEAVER = "leaver";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
    public const MOVER = "mover";
    public const EXTENSIBILITY = "extensibility";
}
