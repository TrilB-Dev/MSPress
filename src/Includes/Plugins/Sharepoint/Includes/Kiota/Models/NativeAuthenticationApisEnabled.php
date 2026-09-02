<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class NativeAuthenticationApisEnabled extends Enum {
    public const NONE = "none";
    public const ALL = "all";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
