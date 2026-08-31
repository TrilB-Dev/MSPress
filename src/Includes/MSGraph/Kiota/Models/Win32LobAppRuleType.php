<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Win32LobAppRuleType extends Enum {
    public const DETECTION = "detection";
    public const REQUIREMENT = "requirement";
}
