<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CustomDataProvidedResourceUploadStatus extends Enum {
    public const ACTIVE = "active";
    public const COMPLETE = "complete";
    public const EXPIRED = "expired";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
