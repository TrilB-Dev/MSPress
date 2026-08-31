<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AccessPackageCatalogState extends Enum {
    public const UNPUBLISHED = "unpublished";
    public const PUBLISHED = "published";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
