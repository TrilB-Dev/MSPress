<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class BookingsServiceAvailabilityType extends Enum {
    public const BOOK_WHEN_STAFF_ARE_FREE = "bookWhenStaffAreFree";
    public const NOT_BOOKABLE = "notBookable";
    public const CUSTOM_WEEKLY_HOURS = "customWeeklyHours";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
