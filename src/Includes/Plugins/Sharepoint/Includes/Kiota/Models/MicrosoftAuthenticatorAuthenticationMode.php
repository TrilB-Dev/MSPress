<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MicrosoftAuthenticatorAuthenticationMode extends Enum {
    public const DEVICE_BASED_PUSH = "deviceBasedPush";
    public const PUSH = "push";
    public const ANY = "any";
}
