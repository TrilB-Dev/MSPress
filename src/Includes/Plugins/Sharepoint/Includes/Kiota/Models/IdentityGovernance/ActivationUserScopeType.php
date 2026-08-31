<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Enum;

class ActivationUserScopeType extends Enum {
    public const ALL_USERS = "allUsers";
    public const FAILED_USERS = "failedUsers";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
