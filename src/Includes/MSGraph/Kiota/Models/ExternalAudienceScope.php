<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ExternalAudienceScope extends Enum {
    public const NONE = "none";
    public const CONTACTS_ONLY = "contactsOnly";
    public const ALL = "all";
}
