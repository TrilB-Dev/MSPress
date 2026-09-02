<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AttributeFlowBehavior extends Enum {
    public const FLOW_WHEN_CHANGED = "FlowWhenChanged";
    public const FLOW_ALWAYS = "FlowAlways";
}
