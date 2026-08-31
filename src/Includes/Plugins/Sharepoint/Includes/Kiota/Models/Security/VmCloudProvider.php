<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class VmCloudProvider extends Enum {
    public const UNKNOWN = "unknown";
    public const AZURE = "azure";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
