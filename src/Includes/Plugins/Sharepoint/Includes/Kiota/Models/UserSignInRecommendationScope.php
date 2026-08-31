<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class UserSignInRecommendationScope extends Enum {
    public const TENANT = "tenant";
    public const APPLICATION = "application";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
