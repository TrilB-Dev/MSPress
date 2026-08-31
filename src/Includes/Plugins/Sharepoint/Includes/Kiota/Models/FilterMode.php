<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class FilterMode extends Enum {
    public const INCLUDE = "include";
    public const EXCLUDE = "exclude";
}
