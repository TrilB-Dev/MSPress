<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DiskType extends Enum {
    public const UNKNOWN = "unknown";
    public const HDD = "hdd";
    public const SSD = "ssd";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
