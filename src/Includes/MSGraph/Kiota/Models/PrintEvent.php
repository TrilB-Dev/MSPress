<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PrintEvent extends Enum {
    public const JOB_STARTED = "jobStarted";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
