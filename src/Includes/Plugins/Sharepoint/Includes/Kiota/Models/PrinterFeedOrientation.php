<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PrinterFeedOrientation extends Enum {
    public const LONG_EDGE_FIRST = "longEdgeFirst";
    public const SHORT_EDGE_FIRST = "shortEdgeFirst";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
