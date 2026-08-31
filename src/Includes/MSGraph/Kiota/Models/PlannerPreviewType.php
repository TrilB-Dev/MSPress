<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PlannerPreviewType extends Enum {
    public const AUTOMATIC = "automatic";
    public const NO_PREVIEW = "noPreview";
    public const CHECKLIST = "checklist";
    public const DESCRIPTION = "description";
    public const REFERENCE = "reference";
}
