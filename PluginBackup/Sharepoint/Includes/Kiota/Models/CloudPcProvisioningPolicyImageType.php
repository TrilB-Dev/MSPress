<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CloudPcProvisioningPolicyImageType extends Enum {
    public const GALLERY = "gallery";
    public const CUSTOM = "custom";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
