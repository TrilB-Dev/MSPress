<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\ExternalConnectors;

use Microsoft\Kiota\Abstractions\Enum;

class ExternalActivityType extends Enum {
    public const VIEWED = "viewed";
    public const MODIFIED = "modified";
    public const CREATED = "created";
    public const COMMENTED = "commented";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
