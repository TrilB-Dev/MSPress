<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ManagedAppFlaggedReason extends Enum {
    public const NONE = "none";
    public const ROOTED_DEVICE = "rootedDevice";
}
