<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ManagedBrowserType extends Enum {
    public const NOT_CONFIGURED = "notConfigured";
    public const MICROSOFT_EDGE = "microsoftEdge";
}
