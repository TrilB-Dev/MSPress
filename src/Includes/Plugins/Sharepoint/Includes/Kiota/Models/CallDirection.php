<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CallDirection extends Enum {
    public const INCOMING = "incoming";
    public const OUTGOING = "outgoing";
}
