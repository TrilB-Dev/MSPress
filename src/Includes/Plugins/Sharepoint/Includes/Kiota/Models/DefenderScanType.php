<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DefenderScanType extends Enum {
    public const USER_DEFINED = "userDefined";
    public const DISABLED = "disabled";
    public const QUICK = "quick";
    public const FULL = "full";
}
