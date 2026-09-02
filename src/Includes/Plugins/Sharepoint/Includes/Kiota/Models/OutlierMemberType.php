<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OutlierMemberType extends Enum {
    public const USER = "user";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
