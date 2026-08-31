<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class BookingReminderRecipients extends Enum {
    public const ALL_ATTENDEES = "allAttendees";
    public const STAFF = "staff";
    public const CUSTOMER = "customer";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
