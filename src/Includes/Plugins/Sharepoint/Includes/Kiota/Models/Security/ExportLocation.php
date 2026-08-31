<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class ExportLocation extends Enum {
    public const RESPONSIVE_LOCATIONS = "responsiveLocations";
    public const NONRESPONSIVE_LOCATIONS = "nonresponsiveLocations";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
