<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AutomaticRepliesStatus extends Enum {
    public const DISABLED = "disabled";
    public const ALWAYS_ENABLED = "alwaysEnabled";
    public const SCHEDULED = "scheduled";
}
