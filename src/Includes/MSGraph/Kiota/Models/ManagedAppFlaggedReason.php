<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ManagedAppFlaggedReason extends Enum {
    public const NONE = "none";
    public const ROOTED_DEVICE = "rootedDevice";
}
