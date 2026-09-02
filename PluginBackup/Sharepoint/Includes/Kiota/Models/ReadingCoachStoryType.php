<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ReadingCoachStoryType extends Enum {
    public const AI_GENERATED = "aiGenerated";
    public const READ_WORKS = "readWorks";
    public const USER_PROVIDED = "userProvided";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
