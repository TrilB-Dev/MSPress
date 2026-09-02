<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AgreementAcceptanceState extends Enum {
    public const ACCEPTED = "accepted";
    public const DECLINED = "declined";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
