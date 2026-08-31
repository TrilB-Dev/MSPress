<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\CallRecords;

use Microsoft\Kiota\Abstractions\Enum;

class NetworkTransportProtocol extends Enum {
    public const UNKNOWN = "unknown";
    public const UDP = "udp";
    public const TCP = "tcp";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
