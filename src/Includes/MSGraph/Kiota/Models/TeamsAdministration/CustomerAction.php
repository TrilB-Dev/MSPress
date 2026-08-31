<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Enum;

class CustomerAction extends Enum {
    public const LOCATION_UPDATE = "locationUpdate";
    public const RELEASE = "release";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
