<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AttestationEnforcement extends Enum {
    public const DISABLED = "disabled";
    public const REGISTRATION_ONLY = "registrationOnly";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
