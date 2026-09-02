<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SharedPCAllowedAccountType extends Enum {
    public const GUEST = "guest";
    public const DOMAIN = "domain";
}
