<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OnenoteUserRole extends Enum {
    public const NONE = "None";
    public const OWNER = "Owner";
    public const CONTRIBUTOR = "Contributor";
    public const READER = "Reader";
}
