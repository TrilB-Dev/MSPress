<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Enum;

class PortInStatus extends Enum {
    public const COMPLETED = "completed";
    public const FIRM_ORDER_COMMITMENT_ACCEPTED = "firmOrderCommitmentAccepted";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
