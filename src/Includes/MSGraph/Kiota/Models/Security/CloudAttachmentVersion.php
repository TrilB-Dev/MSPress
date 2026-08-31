<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class CloudAttachmentVersion extends Enum {
    public const LATEST = "latest";
    public const RECENT10 = "recent10";
    public const RECENT100 = "recent100";
    public const ALL = "all";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
