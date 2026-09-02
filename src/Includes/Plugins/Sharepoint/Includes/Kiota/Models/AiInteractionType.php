<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AiInteractionType extends Enum {
    public const USER_PROMPT = "userPrompt";
    public const AI_RESPONSE = "aiResponse";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
