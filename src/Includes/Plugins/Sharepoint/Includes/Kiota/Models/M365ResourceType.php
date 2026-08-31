<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class M365ResourceType extends Enum {
    public const NONE = "none";
    public const GROUP = "group";
    public const USER = "user";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
