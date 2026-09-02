<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ManagedAppDataStorageLocation extends Enum {
    public const ONE_DRIVE_FOR_BUSINESS = "oneDriveForBusiness";
    public const SHARE_POINT = "sharePoint";
    public const BOX = "box";
    public const LOCAL_STORAGE = "localStorage";
}
