<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DelegatedAdminAccessContainerType extends Enum {
    public const SECURITY_GROUP = "securityGroup";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
