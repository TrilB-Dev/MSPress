<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class X509CertificateAffinityLevel extends Enum {
    public const LOW = "low";
    public const HIGH = "high";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
