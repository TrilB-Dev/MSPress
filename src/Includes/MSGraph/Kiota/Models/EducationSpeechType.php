<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EducationSpeechType extends Enum {
    public const INFORMATIVE = "informative";
    public const PERSONAL = "personal";
    public const PERSUASIVE = "persuasive";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
