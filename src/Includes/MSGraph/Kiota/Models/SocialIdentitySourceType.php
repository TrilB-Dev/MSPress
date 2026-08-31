<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SocialIdentitySourceType extends Enum {
    public const FACEBOOK = "facebook";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
