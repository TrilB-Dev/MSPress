<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ThreatAssessmentContentType extends Enum {
    public const MAIL = "mail";
    public const URL = "url";
    public const FILE = "file";
}
