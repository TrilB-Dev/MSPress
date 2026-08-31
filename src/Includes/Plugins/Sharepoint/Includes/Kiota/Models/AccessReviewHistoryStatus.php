<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AccessReviewHistoryStatus extends Enum {
    public const DONE = "done";
    public const INPROGRESS = "inprogress";
    public const ERROR = "error";
    public const REQUESTED = "requested";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
