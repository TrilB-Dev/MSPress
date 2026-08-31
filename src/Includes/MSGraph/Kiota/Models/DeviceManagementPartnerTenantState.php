<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DeviceManagementPartnerTenantState extends Enum {
    public const UNKNOWN = "unknown";
    public const UNAVAILABLE = "unavailable";
    public const ENABLED = "enabled";
    public const TERMINATED = "terminated";
    public const REJECTED = "rejected";
    public const UNRESPONSIVE = "unresponsive";
}
