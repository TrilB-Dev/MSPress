<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class BookingType extends Enum {
    public const UNKNOWN = "unknown";
    public const STANDARD = "standard";
    public const RESERVED = "reserved";
}
