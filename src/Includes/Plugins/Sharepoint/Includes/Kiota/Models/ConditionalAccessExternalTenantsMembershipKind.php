<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ConditionalAccessExternalTenantsMembershipKind extends Enum {
    public const ALL = "all";
    public const ENUMERATED = "enumerated";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
