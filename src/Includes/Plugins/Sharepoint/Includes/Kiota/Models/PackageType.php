<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PackageType extends Enum {
    public const MICROSOFT = "microsoft";
    public const EXTERNAL = "external";
    public const SHARED = "shared";
    public const CUSTOM = "custom";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
