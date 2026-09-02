<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class EngagementConversationModerationState extends Enum {
    public const PUBLISHED = "published";
    public const PENDING_REVIEW = "pendingReview";
    public const DISMISSED = "dismissed";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
