<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class QueryType extends Enum {
    public const FILES = "files";
    public const MESSAGES = "messages";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
