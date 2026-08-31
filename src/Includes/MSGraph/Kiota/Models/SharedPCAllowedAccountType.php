<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SharedPCAllowedAccountType extends Enum {
    public const GUEST = "guest";
    public const DOMAIN = "domain";
}
