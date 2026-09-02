<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CloudPcAuditActivityOperationType extends Enum {
    public const CREATE = "create";
    public const DELETE = "delete";
    public const PATCH = "patch";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
