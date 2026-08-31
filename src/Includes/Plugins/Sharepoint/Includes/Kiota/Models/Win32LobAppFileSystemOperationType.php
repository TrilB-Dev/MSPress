<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Win32LobAppFileSystemOperationType extends Enum {
    public const NOT_CONFIGURED = "notConfigured";
    public const EXISTS = "exists";
    public const MODIFIED_DATE = "modifiedDate";
    public const CREATED_DATE = "createdDate";
    public const VERSION = "version";
    public const SIZE_IN_M_B = "sizeInMB";
}
