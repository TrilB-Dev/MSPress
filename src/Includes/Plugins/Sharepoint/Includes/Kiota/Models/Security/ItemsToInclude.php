<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class ItemsToInclude extends Enum {
    public const SEARCH_HITS = "searchHits";
    public const PARTIALLY_INDEXED = "partiallyIndexed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
