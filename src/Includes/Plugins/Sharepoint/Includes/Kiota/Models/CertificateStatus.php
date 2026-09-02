<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class CertificateStatus extends Enum {
    public const NOT_PROVISIONED = "notProvisioned";
    public const PROVISIONED = "provisioned";
}
