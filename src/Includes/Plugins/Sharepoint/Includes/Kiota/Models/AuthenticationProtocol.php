<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationProtocol extends Enum {
    public const WS_FED = "wsFed";
    public const SAML = "saml";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
