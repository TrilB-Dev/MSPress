<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PermissionType extends Enum {
    public const DELEGATED_USER_CONSENTABLE = "delegatedUserConsentable";
    public const DELEGATED = "delegated";
    public const APPLICATION = "application";
}
