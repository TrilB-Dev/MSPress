<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class WebsiteType extends Enum {
    public const OTHER = "other";
    public const HOME = "home";
    public const WORK = "work";
    public const BLOG = "blog";
    public const PROFILE = "profile";
}
