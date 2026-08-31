<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConfigurationMonitoringResult extends Entity implements Parsable 
{
    /**
     * @var int|null $driftsCount Number of drifts observed during a monitor run. Supports $filter (eq, ne, ge, le) and $orderby.
    */
    private ?int $driftsCount = null;
    
    /**
     * @var array<ErrorDetail>|null $errorDetails All the error details that prevent the monitor from running successfully. The error details are a contained entity. Requires $select to retrieve.
    */
    private ?array $errorDetails = null;
    
    /**
     * @var string|null $monitorId Globally unique identifier (GUID) of the monitor. System-generated. Supports $filter (eq, ne).
    */
    private ?string $monitorId = null;
    
    /**
     * @var DateTime|null $runCompletionDateTime Date and time at which the monitor run completed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
    */
    private ?DateTime $runCompletionDateTime = null;
    
    /**
     * @var DateTime|null $runInitiationDateTime Date and time at which the monitor run initiated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
    */
    private ?DateTime $runInitiationDateTime = null;
    
    /**
     * @var MonitorRunStatus|null $runStatus The runStatus property
    */
    private ?MonitorRunStatus $runStatus = null;
    
    /**
     * @var string|null $tenantId Globally unique identifier (GUID) of the tenant for which the monitor runs. Fetched automatically by the system. Supports $filter (eq, ne).
    */
    private ?string $tenantId = null;
    
    /**
     * Instantiates a new ConfigurationMonitoringResult and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConfigurationMonitoringResult
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConfigurationMonitoringResult {
        return new ConfigurationMonitoringResult();
    }

    /**
     * Gets the driftsCount property value. Number of drifts observed during a monitor run. Supports $filter (eq, ne, ge, le) and $orderby.
     * @return int|null
    */
    public function getDriftsCount(): ?int {
        return $this->driftsCount;
    }

    /**
     * Gets the errorDetails property value. All the error details that prevent the monitor from running successfully. The error details are a contained entity. Requires $select to retrieve.
     * @return array<ErrorDetail>|null
    */
    public function getErrorDetails(): ?array {
        return $this->errorDetails;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'driftsCount' => fn(ParseNode $n) => $o->setDriftsCount($n->getIntegerValue()),
            'errorDetails' => fn(ParseNode $n) => $o->setErrorDetails($n->getCollectionOfObjectValues([ErrorDetail::class, 'createFromDiscriminatorValue'])),
            'monitorId' => fn(ParseNode $n) => $o->setMonitorId($n->getStringValue()),
            'runCompletionDateTime' => fn(ParseNode $n) => $o->setRunCompletionDateTime($n->getDateTimeValue()),
            'runInitiationDateTime' => fn(ParseNode $n) => $o->setRunInitiationDateTime($n->getDateTimeValue()),
            'runStatus' => fn(ParseNode $n) => $o->setRunStatus($n->getEnumValue(MonitorRunStatus::class)),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the monitorId property value. Globally unique identifier (GUID) of the monitor. System-generated. Supports $filter (eq, ne).
     * @return string|null
    */
    public function getMonitorId(): ?string {
        return $this->monitorId;
    }

    /**
     * Gets the runCompletionDateTime property value. Date and time at which the monitor run completed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @return DateTime|null
    */
    public function getRunCompletionDateTime(): ?DateTime {
        return $this->runCompletionDateTime;
    }

    /**
     * Gets the runInitiationDateTime property value. Date and time at which the monitor run initiated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @return DateTime|null
    */
    public function getRunInitiationDateTime(): ?DateTime {
        return $this->runInitiationDateTime;
    }

    /**
     * Gets the runStatus property value. The runStatus property
     * @return MonitorRunStatus|null
    */
    public function getRunStatus(): ?MonitorRunStatus {
        return $this->runStatus;
    }

    /**
     * Gets the tenantId property value. Globally unique identifier (GUID) of the tenant for which the monitor runs. Fetched automatically by the system. Supports $filter (eq, ne).
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('runStatus', $this->getRunStatus());
    }

    /**
     * Sets the driftsCount property value. Number of drifts observed during a monitor run. Supports $filter (eq, ne, ge, le) and $orderby.
     * @param int|null $value Value to set for the driftsCount property.
    */
    public function setDriftsCount(?int $value): void {
        $this->driftsCount = $value;
    }

    /**
     * Sets the errorDetails property value. All the error details that prevent the monitor from running successfully. The error details are a contained entity. Requires $select to retrieve.
     * @param array<ErrorDetail>|null $value Value to set for the errorDetails property.
    */
    public function setErrorDetails(?array $value): void {
        $this->errorDetails = $value;
    }

    /**
     * Sets the monitorId property value. Globally unique identifier (GUID) of the monitor. System-generated. Supports $filter (eq, ne).
     * @param string|null $value Value to set for the monitorId property.
    */
    public function setMonitorId(?string $value): void {
        $this->monitorId = $value;
    }

    /**
     * Sets the runCompletionDateTime property value. Date and time at which the monitor run completed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @param DateTime|null $value Value to set for the runCompletionDateTime property.
    */
    public function setRunCompletionDateTime(?DateTime $value): void {
        $this->runCompletionDateTime = $value;
    }

    /**
     * Sets the runInitiationDateTime property value. Date and time at which the monitor run initiated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @param DateTime|null $value Value to set for the runInitiationDateTime property.
    */
    public function setRunInitiationDateTime(?DateTime $value): void {
        $this->runInitiationDateTime = $value;
    }

    /**
     * Sets the runStatus property value. The runStatus property
     * @param MonitorRunStatus|null $value Value to set for the runStatus property.
    */
    public function setRunStatus(?MonitorRunStatus $value): void {
        $this->runStatus = $value;
    }

    /**
     * Sets the tenantId property value. Globally unique identifier (GUID) of the tenant for which the monitor runs. Fetched automatically by the system. Supports $filter (eq, ne).
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

}
