<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WindowsStartMenuModeType extends Enum {
    public const USER_DEFINED = "userDefined";
    public const FULL_SCREEN = "fullScreen";
    public const NON_FULL_SCREEN = "nonFullScreen";
}
