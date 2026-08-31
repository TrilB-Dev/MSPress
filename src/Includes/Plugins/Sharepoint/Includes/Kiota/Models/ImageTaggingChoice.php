<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ImageTaggingChoice extends Enum {
    public const DISABLED = "disabled";
    public const BASIC = "basic";
    public const ENHANCED = "enhanced";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
