<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ConnectorType extends Enum {
    public const SAP_IAG = "sapIag";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
