<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AppKeyCredentialRestrictionType extends Enum {
    public const ASYMMETRIC_KEY_LIFETIME = "asymmetricKeyLifetime";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
