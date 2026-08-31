<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class OnlineMeetingProviderType extends Enum {
    public const UNKNOWN = "unknown";
    public const SKYPE_FOR_BUSINESS = "skypeForBusiness";
    public const SKYPE_FOR_CONSUMER = "skypeForConsumer";
    public const TEAMS_FOR_BUSINESS = "teamsForBusiness";
}
