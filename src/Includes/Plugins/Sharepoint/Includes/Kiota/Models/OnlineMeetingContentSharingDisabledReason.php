<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OnlineMeetingContentSharingDisabledReason extends Enum {
    public const WATERMARK_PROTECTION = "watermarkProtection";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
