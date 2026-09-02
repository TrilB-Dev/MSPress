<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DiagnosticDataSubmissionMode extends Enum {
    public const USER_DEFINED = "userDefined";
    public const NONE = "none";
    public const BASIC = "basic";
    public const ENHANCED = "enhanced";
    public const FULL = "full";
}
