<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MeetingChatHistoryDefaultMode extends Enum {
    public const NONE = "none";
    public const ALL = "all";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
