<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Enum;

class AssignmentCategory extends Enum {
    public const PRIMARY = "primary";
    public const PRIVATE = "private";
    public const ALTERNATE = "alternate";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
