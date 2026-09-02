<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OnlineMeetingType extends Enum {
    public const ADHOC = "adhoc";
    public const SCHEDULED = "scheduled";
    public const RECURRING = "recurring";
    public const BROADCAST = "broadcast";
    public const MEETNOW = "meetnow";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
