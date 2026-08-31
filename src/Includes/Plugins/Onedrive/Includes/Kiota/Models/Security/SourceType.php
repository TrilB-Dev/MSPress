<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class SourceType extends Enum {
    public const MAILBOX = "mailbox";
    public const SITE = "site";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
