<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class FeatureTargetType extends Enum {
    public const GROUP = "group";
    public const ADMINISTRATIVE_UNIT = "administrativeUnit";
    public const ROLE = "role";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
