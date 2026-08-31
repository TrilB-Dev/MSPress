<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsHelloForBusinessPinUsage extends Enum {
    public const ALLOWED = "allowed";
    public const REQUIRED = "required";
    public const DISALLOWED = "disallowed";
}
