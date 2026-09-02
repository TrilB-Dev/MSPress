<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MediaDirection extends Enum {
    public const INACTIVE = "inactive";
    public const SEND_ONLY = "sendOnly";
    public const RECEIVE_ONLY = "receiveOnly";
    public const SEND_RECEIVE = "sendReceive";
}
