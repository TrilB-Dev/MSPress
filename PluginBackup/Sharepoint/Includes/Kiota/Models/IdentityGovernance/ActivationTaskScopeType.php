<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Enum;

class ActivationTaskScopeType extends Enum {
    public const ALL_TASKS = "allTasks";
    public const FAILED_TASKS = "failedTasks";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
