<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Win32LobAppRuleType extends Enum {
    public const DETECTION = "detection";
    public const REQUIREMENT = "requirement";
}
