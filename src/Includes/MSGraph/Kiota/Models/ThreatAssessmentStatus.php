<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ThreatAssessmentStatus extends Enum {
    public const PENDING = "pending";
    public const COMPLETED = "completed";
}
