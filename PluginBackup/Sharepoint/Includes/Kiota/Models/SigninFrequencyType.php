<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SigninFrequencyType extends Enum {
    public const DAYS = "days";
    public const HOURS = "hours";
}
