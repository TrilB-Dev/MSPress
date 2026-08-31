<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PciVersion extends Enum {
    public const NONE = "none";
    public const V3_2_1 = "v3_2_1";
    public const V4 = "v4";
    public const NOT_SUPPORTED = "notSupported";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
