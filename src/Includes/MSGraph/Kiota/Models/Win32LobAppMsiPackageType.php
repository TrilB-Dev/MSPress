<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Win32LobAppMsiPackageType extends Enum {
    public const PER_MACHINE = "perMachine";
    public const PER_USER = "perUser";
    public const DUAL_PURPOSE = "dualPurpose";
}
