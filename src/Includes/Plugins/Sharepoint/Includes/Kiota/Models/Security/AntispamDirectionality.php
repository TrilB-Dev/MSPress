<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class AntispamDirectionality extends Enum {
    public const UNKNOWN = "unknown";
    public const INBOUND = "inbound";
    public const OUTBOUND = "outbound";
    public const INTRA_ORG = "intraOrg";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
