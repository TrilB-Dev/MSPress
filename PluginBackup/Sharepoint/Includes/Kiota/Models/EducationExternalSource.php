<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EducationExternalSource extends Enum {
    public const SIS = "sis";
    public const MANUAL = "manual";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
