<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class VisibilitySetting extends Enum {
    public const NOT_CONFIGURED = "notConfigured";
    public const HIDE = "hide";
    public const SHOW = "show";
}
