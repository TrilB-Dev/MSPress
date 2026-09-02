<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RunAsAccountType extends Enum {
    public const SYSTEM = "system";
    public const USER = "user";
}
