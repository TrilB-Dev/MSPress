<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CommunityPrivacy extends Enum {
    public const PUBLIC = "public";
    public const PRIVATE = "private";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
