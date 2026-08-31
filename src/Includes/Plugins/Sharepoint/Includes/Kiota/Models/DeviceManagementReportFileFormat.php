<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DeviceManagementReportFileFormat extends Enum {
    public const CSV = "csv";
    public const PDF = "pdf";
    public const JSON = "json";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
