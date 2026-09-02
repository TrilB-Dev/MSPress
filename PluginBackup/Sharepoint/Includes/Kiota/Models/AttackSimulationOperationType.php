<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AttackSimulationOperationType extends Enum {
    public const CREATE_SIMUALATION = "createSimualation";
    public const UPDATE_SIMULATION = "updateSimulation";
    public const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
