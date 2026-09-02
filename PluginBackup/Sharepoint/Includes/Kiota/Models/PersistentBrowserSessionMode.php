<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PersistentBrowserSessionMode extends Enum {
    public const ALWAYS = "always";
    public const NEVER = "never";
}
