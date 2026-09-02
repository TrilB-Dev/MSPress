<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MatchConfidenceLevel extends Enum {
    public const EXACT = "exact";
    public const RELAXED = "relaxed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
