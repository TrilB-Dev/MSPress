<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PrintEvent extends Enum {
    public const JOB_STARTED = "jobStarted";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
