<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AccessPackageSuggestionRelatedPeopleInsightLevel extends Enum {
    public const DISABLED = "disabled";
    public const COUNT = "count";
    public const COUNT_AND_NAMES = "countAndNames";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
