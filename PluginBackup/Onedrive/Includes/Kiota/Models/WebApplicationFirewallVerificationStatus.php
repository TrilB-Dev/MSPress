<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WebApplicationFirewallVerificationStatus extends Enum {
    public const SUCCESS = "success";
    public const WARNING = "warning";
    public const FAILURE = "failure";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
