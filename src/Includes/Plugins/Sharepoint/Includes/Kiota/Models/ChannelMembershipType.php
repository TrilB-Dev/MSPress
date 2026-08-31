<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ChannelMembershipType extends Enum {
    public const STANDARD = "standard";
    public const PRIVATE = "private";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
    public const SHARED = "shared";
}
