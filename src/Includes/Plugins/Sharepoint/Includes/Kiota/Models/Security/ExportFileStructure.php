<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class ExportFileStructure extends Enum {
    public const NONE = "none";
    public const DIRECTORY = "directory";
    public const PST = "pst";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
    public const MSG = "msg";
}
