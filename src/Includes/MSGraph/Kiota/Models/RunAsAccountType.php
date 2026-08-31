<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RunAsAccountType extends Enum {
    public const SYSTEM = "system";
    public const USER = "user";
}
