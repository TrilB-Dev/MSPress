<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AttributeMappingSourceType extends Enum {
    public const ATTRIBUTE = "Attribute";
    public const CONSTANT = "Constant";
    public const FUNCTION = "Function";
}
