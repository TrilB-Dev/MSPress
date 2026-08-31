<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EdgeCookiePolicy extends Enum {
    public const USER_DEFINED = "userDefined";
    public const ALLOW = "allow";
    public const BLOCK_THIRD_PARTY = "blockThirdParty";
    public const BLOCK_ALL = "blockAll";
}
