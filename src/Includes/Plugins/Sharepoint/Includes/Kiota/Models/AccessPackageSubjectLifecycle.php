<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AccessPackageSubjectLifecycle extends Enum {
    public const NOT_DEFINED = "notDefined";
    public const NOT_GOVERNED = "notGoverned";
    public const GOVERNED = "governed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
