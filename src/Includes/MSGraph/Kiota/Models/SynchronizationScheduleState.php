<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SynchronizationScheduleState extends Enum {
    public const ACTIVE = "Active";
    public const DISABLED = "Disabled";
    public const PAUSED = "Paused";
}
