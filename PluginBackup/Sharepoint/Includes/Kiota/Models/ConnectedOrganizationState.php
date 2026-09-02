<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ConnectedOrganizationState extends Enum {
    public const CONFIGURED = "configured";
    public const PROPOSED = "proposed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
