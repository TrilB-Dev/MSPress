<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PagePromotionType extends Enum {
    public const MICROSOFT_RESERVED = "microsoftReserved";
    public const PAGE = "page";
    public const NEWS_POST = "newsPost";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
