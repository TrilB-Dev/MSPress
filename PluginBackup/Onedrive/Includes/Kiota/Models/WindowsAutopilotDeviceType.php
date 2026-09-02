<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsAutopilotDeviceType extends Enum {
    public const WINDOWS_PC = "windowsPc";
    public const HOLO_LENS = "holoLens";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
