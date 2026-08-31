<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class ContainerPortProtocol extends Enum {
    public const UDP = "udp";
    public const TCP = "tcp";
    public const SCTP = "sctp";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
