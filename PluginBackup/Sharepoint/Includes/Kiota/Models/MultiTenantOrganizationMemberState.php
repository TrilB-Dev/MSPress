<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MultiTenantOrganizationMemberState extends Enum {
    public const PENDING = "pending";
    public const ACTIVE = "active";
    public const REMOVED = "removed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
