<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OnlineMeetingVideoDisabledReason extends Enum {
    public const WATERMARK_PROTECTION = "watermarkProtection";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
