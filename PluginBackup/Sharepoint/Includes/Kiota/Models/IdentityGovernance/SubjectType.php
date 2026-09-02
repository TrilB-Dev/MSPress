<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Enum;

class SubjectType extends Enum {
    public const USER = "user";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
    public const PROVISIONING_OBJECT = "provisioningObject";
}
