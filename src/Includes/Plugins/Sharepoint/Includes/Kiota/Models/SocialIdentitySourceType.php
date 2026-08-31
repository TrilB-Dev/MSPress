<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SocialIdentitySourceType extends Enum {
    public const FACEBOOK = "facebook";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
