<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EngagementAsyncOperationType extends Enum {
    public const CREATE_COMMUNITY = "createCommunity";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
