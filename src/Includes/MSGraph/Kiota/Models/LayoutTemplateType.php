<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class LayoutTemplateType extends Enum {
    public const DEFAULT = "default";
    public const VERTICAL_SPLIT = "verticalSplit";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
