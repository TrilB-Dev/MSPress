<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Enum;

class KubernetesPlatform extends Enum {
    public const UNKNOWN = "unknown";
    public const AKS = "aks";
    public const EKS = "eks";
    public const GKE = "gke";
    public const ARC = "arc";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
