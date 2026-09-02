<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class InternetSiteSecurityLevel extends Enum {
    public const USER_DEFINED = "userDefined";
    public const MEDIUM = "medium";
    public const MEDIUM_HIGH = "mediumHigh";
    public const HIGH = "high";
}
