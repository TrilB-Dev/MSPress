<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WebApplicationFirewallProviderType extends Enum {
    public const AKAMAI = "akamai";
    public const CLOUDFLARE = "cloudflare";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
