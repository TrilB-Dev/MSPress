<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PackageStatus extends Enum {
    public const NONE = "none";
    public const SOME = "some";
    public const ALL = "all";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
