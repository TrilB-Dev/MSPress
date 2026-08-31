<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class BookingPageAccessControl extends Enum {
    public const UNRESTRICTED = "unrestricted";
    public const RESTRICTED_TO_ORGANIZATION = "restrictedToOrganization";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
