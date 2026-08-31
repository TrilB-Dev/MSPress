<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RequiredPasswordType extends Enum {
    public const DEVICE_DEFAULT = "deviceDefault";
    public const ALPHANUMERIC = "alphanumeric";
    public const NUMERIC = "numeric";
}
