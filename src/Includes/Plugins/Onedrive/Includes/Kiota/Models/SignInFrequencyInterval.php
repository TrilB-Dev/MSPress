<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SignInFrequencyInterval extends Enum {
    public const TIME_BASED = "timeBased";
    public const EVERY_TIME = "everyTime";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
