<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class TeamVisibilityType extends Enum {
    public const PRIVATE = "private";
    public const PUBLIC = "public";
    public const HIDDEN_MEMBERSHIP = "hiddenMembership";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
