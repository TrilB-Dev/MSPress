<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OnPremisesDirectorySynchronizationDeletionPreventionType extends Enum {
    public const DISABLED = "disabled";
    public const ENABLED_FOR_COUNT = "enabledForCount";
    public const ENABLED_FOR_PERCENTAGE = "enabledForPercentage";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
