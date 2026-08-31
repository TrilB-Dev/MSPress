<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SharedPCAllowedAccountType extends Enum {
    public const GUEST = "guest";
    public const DOMAIN = "domain";
}
