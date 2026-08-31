<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class IosNotificationAlertType extends Enum {
    public const DEVICE_DEFAULT = "deviceDefault";
    public const BANNER = "banner";
    public const MODAL = "modal";
    public const NONE = "none";
}
