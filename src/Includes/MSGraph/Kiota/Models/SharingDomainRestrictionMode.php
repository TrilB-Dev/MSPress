<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SharingDomainRestrictionMode extends Enum {
    public const NONE = "none";
    public const ALLOW_LIST = "allowList";
    public const BLOCK_LIST = "blockList";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
