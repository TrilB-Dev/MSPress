<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class TeamworkConversationIdentityType extends Enum {
    public const TEAM = "team";
    public const CHANNEL = "channel";
    public const CHAT = "chat";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
