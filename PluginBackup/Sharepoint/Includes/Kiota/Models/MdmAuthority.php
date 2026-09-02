<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class MdmAuthority extends Enum {
    public const UNKNOWN = "unknown";
    public const INTUNE = "intune";
    public const SCCM = "sccm";
    public const OFFICE365 = "office365";
}
