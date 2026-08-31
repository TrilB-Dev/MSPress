<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EducationModuleStatus extends Enum {
    public const DRAFT = "draft";
    public const PUBLISHED = "published";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
