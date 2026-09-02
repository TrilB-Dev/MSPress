<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Enum;

class AssignmentType extends Enum {
    public const DIRECT = "direct";
    public const GROUP = "group";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
