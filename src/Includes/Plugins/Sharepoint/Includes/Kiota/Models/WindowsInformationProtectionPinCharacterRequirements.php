<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsInformationProtectionPinCharacterRequirements extends Enum {
    public const NOT_ALLOW = "notAllow";
    public const REQUIRE_AT_LEAST_ONE = "requireAtLeastOne";
    public const ALLOW = "allow";
}
