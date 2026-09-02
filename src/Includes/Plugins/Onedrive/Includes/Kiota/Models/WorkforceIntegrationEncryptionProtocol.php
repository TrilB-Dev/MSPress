<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WorkforceIntegrationEncryptionProtocol extends Enum {
    public const SHARED_SECRET = "sharedSecret";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
