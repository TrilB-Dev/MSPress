<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class HostPortProtocol extends Enum {
    public const TCP = "tcp";
    public const UDP = "udp";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
