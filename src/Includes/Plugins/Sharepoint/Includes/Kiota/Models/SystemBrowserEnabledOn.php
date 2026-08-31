<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SystemBrowserEnabledOn extends Enum {
    public const NONE = "none";
    public const IOS = "ios";
    public const ANDROID = "android";
    public const MAC = "mac";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
