<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AttendeeType extends Enum {
    public const REQUIRED = "required";
    public const OPTIONAL = "optional";
    public const RESOURCE = "resource";
}
