<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class ChildSelectability extends Enum {
    public const ONE = "One";
    public const MANY = "Many";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
