<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ObjectFlowTypes extends Enum {
    public const NONE = "None";
    public const ADD = "Add";
    public const UPDATE = "Update";
    public const DELETE = "Delete";
}
