<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ErrorCorrectionLevel extends Enum {
    public const L = "l";
    public const M = "m";
    public const Q = "q";
    public const H = "h";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
