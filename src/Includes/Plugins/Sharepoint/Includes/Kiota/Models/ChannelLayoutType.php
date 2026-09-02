<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ChannelLayoutType extends Enum {
    public const POST = "post";
    public const CHAT = "chat";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
