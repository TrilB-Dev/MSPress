<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConfigurationMonitor extends Entity implements Parsable 
{
    /**
     * @var ConfigurationBaseline|null $baseline The baseline property
    */
    private ?ConfigurationBaseline $baseline = null;
    
    /**
     * @var IdentitySet|null $createdBy The createdBy property
    */
    private ?IdentitySet $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when the monitor was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description User-friendly description of the monitor given by the user. Supports $filter (eq, ne, startsWith) and $orderby.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName User-friendly name given by the user to the monitor. Supports $filter (eq, ne, startsWith) and $orderby.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $inactivationReason The reason for the monitor's inactivation. Requires $select to retrieve.
    */
    private ?string $inactivationReason = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy The lastModifiedBy property
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The date and time when the monitor was last modified. If no modifications are made to the monitor, it's the same as createdDateTime. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var MonitorMode|null $mode The mode property
    */
    private ?MonitorMode $mode = null;
    
    /**
     * @var int|null $monitorRunFrequencyInHours Frequency at which the monitor runs. The default frequency is six hours. Regardless of when you create or update a monitor, it gets triggered within the next 6 hours. Currently, monitors are picked up at fixed times: 6 AM, 12 PM, 6 PM, and 12 AM (all in GMT). For example, if you create a monitor at 9 AM, it gets triggered around 12 PM. If you update a monitor at 4 PM, it gets triggered around 6 PM.
    */
    private ?int $monitorRunFrequencyInHours = null;
    
    /**
     * @var OpenComplexDictionaryType|null $parameters Key-value pairs that contain parameter values which might be used in the baseline. Requires $select to retrieve.
    */
    private ?OpenComplexDictionaryType $parameters = null;
    
    /**
     * @var MonitorStatus|null $status The status property
    */
    private ?MonitorStatus $status = null;
    
    /**
     * @var string|null $tenantId Globally unique identifier (GUID) of the tenant for which the monitor runs. Fetched automatically by the system. Supports $filter (eq, ne).
    */
    private ?string $tenantId = null;
    
    /**
     * Instantiates a new ConfigurationMonitor and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConfigurationMonitor
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConfigurationMonitor {
        return new ConfigurationMonitor();
    }

    /**
     * Gets the baseline property value. The baseline property
     * @return ConfigurationBaseline|null
    */
    public function getBaseline(): ?ConfigurationBaseline {
        return $this->baseline;
    }

    /**
     * Gets the createdBy property value. The createdBy property
     * @return IdentitySet|null
    */
    public function getCreatedBy(): ?IdentitySet {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. The date and time when the monitor was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. User-friendly description of the monitor given by the user. Supports $filter (eq, ne, startsWith) and $orderby.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. User-friendly name given by the user to the monitor. Supports $filter (eq, ne, startsWith) and $orderby.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'baseline' => fn(ParseNode $n) => $o->setBaseline($n->getObjectValue([ConfigurationBaseline::class, 'createFromDiscriminatorValue'])),
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'inactivationReason' => fn(ParseNode $n) => $o->setInactivationReason($n->getStringValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'mode' => fn(ParseNode $n) => $o->setMode($n->getEnumValue(MonitorMode::class)),
            'monitorRunFrequencyInHours' => fn(ParseNode $n) => $o->setMonitorRunFrequencyInHours($n->getIntegerValue()),
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([OpenComplexDictionaryType::class, 'createFromDiscriminatorValue'])),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(MonitorStatus::class)),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the inactivationReason property value. The reason for the monitor's inactivation. Requires $select to retrieve.
     * @return string|null
    */
    public function getInactivationReason(): ?string {
        return $this->inactivationReason;
    }

    /**
     * Gets the lastModifiedBy property value. The lastModifiedBy property
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. The date and time when the monitor was last modified. If no modifications are made to the monitor, it's the same as createdDateTime. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the mode property value. The mode property
     * @return MonitorMode|null
    */
    public function getMode(): ?MonitorMode {
        return $this->mode;
    }

    /**
     * Gets the monitorRunFrequencyInHours property value. Frequency at which the monitor runs. The default frequency is six hours. Regardless of when you create or update a monitor, it gets triggered within the next 6 hours. Currently, monitors are picked up at fixed times: 6 AM, 12 PM, 6 PM, and 12 AM (all in GMT). For example, if you create a monitor at 9 AM, it gets triggered around 12 PM. If you update a monitor at 4 PM, it gets triggered around 6 PM.
     * @return int|null
    */
    public function getMonitorRunFrequencyInHours(): ?int {
        return $this->monitorRunFrequencyInHours;
    }

    /**
     * Gets the parameters property value. Key-value pairs that contain parameter values which might be used in the baseline. Requires $select to retrieve.
     * @return OpenComplexDictionaryType|null
    */
    public function getParameters(): ?OpenComplexDictionaryType {
        return $this->parameters;
    }

    /**
     * Gets the status property value. The status property
     * @return MonitorStatus|null
    */
    public function getStatus(): ?MonitorStatus {
        return $this->status;
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
        $writer->writeObjectValue('baseline', $this->getBaseline());
        $writer->writeObjectValue('createdBy', $this->getCreatedBy());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeEnumValue('mode', $this->getMode());
        $writer->writeObjectValue('parameters', $this->getParameters());
        $writer->writeEnumValue('status', $this->getStatus());
    }

    /**
     * Sets the baseline property value. The baseline property
     * @param ConfigurationBaseline|null $value Value to set for the baseline property.
    */
    public function setBaseline(?ConfigurationBaseline $value): void {
        $this->baseline = $value;
    }

    /**
     * Sets the createdBy property value. The createdBy property
     * @param IdentitySet|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?IdentitySet $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when the monitor was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. User-friendly description of the monitor given by the user. Supports $filter (eq, ne, startsWith) and $orderby.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. User-friendly name given by the user to the monitor. Supports $filter (eq, ne, startsWith) and $orderby.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the inactivationReason property value. The reason for the monitor's inactivation. Requires $select to retrieve.
     * @param string|null $value Value to set for the inactivationReason property.
    */
    public function setInactivationReason(?string $value): void {
        $this->inactivationReason = $value;
    }

    /**
     * Sets the lastModifiedBy property value. The lastModifiedBy property
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The date and time when the monitor was last modified. If no modifications are made to the monitor, it's the same as createdDateTime. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the mode property value. The mode property
     * @param MonitorMode|null $value Value to set for the mode property.
    */
    public function setMode(?MonitorMode $value): void {
        $this->mode = $value;
    }

    /**
     * Sets the monitorRunFrequencyInHours property value. Frequency at which the monitor runs. The default frequency is six hours. Regardless of when you create or update a monitor, it gets triggered within the next 6 hours. Currently, monitors are picked up at fixed times: 6 AM, 12 PM, 6 PM, and 12 AM (all in GMT). For example, if you create a monitor at 9 AM, it gets triggered around 12 PM. If you update a monitor at 4 PM, it gets triggered around 6 PM.
     * @param int|null $value Value to set for the monitorRunFrequencyInHours property.
    */
    public function setMonitorRunFrequencyInHours(?int $value): void {
        $this->monitorRunFrequencyInHours = $value;
    }

    /**
     * Sets the parameters property value. Key-value pairs that contain parameter values which might be used in the baseline. Requires $select to retrieve.
     * @param OpenComplexDictionaryType|null $value Value to set for the parameters property.
    */
    public function setParameters(?OpenComplexDictionaryType $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param MonitorStatus|null $value Value to set for the status property.
    */
    public function setStatus(?MonitorStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the tenantId property value. Globally unique identifier (GUID) of the tenant for which the monitor runs. Fetched automatically by the system. Supports $filter (eq, ne).
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

}
