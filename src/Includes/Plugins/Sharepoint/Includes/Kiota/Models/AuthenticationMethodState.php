<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationMethodState extends Enum {
    public const ENABLED = "enabled";
    public const DISABLED = "disabled";
}
