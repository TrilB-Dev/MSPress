<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class IntelligenceProfileKind extends Enum {
    public const ACTOR = "actor";
    public const TOOL = "tool";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
