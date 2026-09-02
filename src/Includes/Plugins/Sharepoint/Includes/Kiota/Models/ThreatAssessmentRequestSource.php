<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ThreatAssessmentRequestSource extends Enum {
    public const UNDEFINED = "undefined";
    public const USER = "user";
    public const ADMINISTRATOR = "administrator";
}
