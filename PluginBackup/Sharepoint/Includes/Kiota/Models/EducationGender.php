<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EducationGender extends Enum {
    public const FEMALE = "female";
    public const MALE = "male";
    public const OTHER = "other";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
