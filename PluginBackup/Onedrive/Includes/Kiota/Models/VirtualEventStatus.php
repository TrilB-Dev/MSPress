<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class VirtualEventStatus extends Enum {
    public const DRAFT = "draft";
    public const PUBLISHED = "published";
    public const CANCELED = "canceled";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
