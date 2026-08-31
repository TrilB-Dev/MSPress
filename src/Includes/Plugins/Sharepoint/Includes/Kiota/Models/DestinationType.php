<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DestinationType extends Enum {
    public const NEW = "new";
    public const IN_PLACE = "inPlace";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
