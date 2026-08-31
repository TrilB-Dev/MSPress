<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConfigurationDrift extends Entity implements Parsable 
{
    /**
     * @var string|null $baselineResourceDisplayName Resource instance for which the drift is detected. Supports $filter (eq, ne, startsWith) and $orderby.
    */
    private ?string $baselineResourceDisplayName = null;
    
    /**
     * @var array<DriftedProperty>|null $driftedProperties Properties within one or more resource instances in which drift is detected. Requires $select to retrieve.
    */
    private ?array $driftedProperties = null;
    
    /**
     * @var DateTime|null $firstReportedDateTime The date and time at which drift is first detected. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
    */
    private ?DateTime $firstReportedDateTime = null;
    
    /**
     * @var string|null $monitorId Globally unique identifier (GUID) of the monitor. System-generated. Supports $filter (eq, ne).
    */
    private ?string $monitorId = null;
    
    /**
     * @var OpenComplexDictionaryType|null $resourceInstanceIdentifier The resourceInstanceIdentifier property
    */
    private ?OpenComplexDictionaryType $resourceInstanceIdentifier = null;
    
    /**
     * @var string|null $resourceType Resource for which the drift is detected. Supports $filter (eq, ne, startsWith).
    */
    private ?string $resourceType = null;
    
    /**
     * @var DriftStatus|null $status The status property
    */
    private ?DriftStatus $status = null;
    
    /**
     * @var string|null $tenantId Globally unique identifier (GUID) of the tenant for which the monitor runs. Fetched automatically by the system. Supports $filter (eq, ne).
    */
    private ?string $tenantId = null;
    
    /**
     * Instantiates a new ConfigurationDrift and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConfigurationDrift
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConfigurationDrift {
        return new ConfigurationDrift();
    }

    /**
     * Gets the baselineResourceDisplayName property value. Resource instance for which the drift is detected. Supports $filter (eq, ne, startsWith) and $orderby.
     * @return string|null
    */
    public function getBaselineResourceDisplayName(): ?string {
        return $this->baselineResourceDisplayName;
    }

    /**
     * Gets the driftedProperties property value. Properties within one or more resource instances in which drift is detected. Requires $select to retrieve.
     * @return array<DriftedProperty>|null
    */
    public function getDriftedProperties(): ?array {
        return $this->driftedProperties;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'baselineResourceDisplayName' => fn(ParseNode $n) => $o->setBaselineResourceDisplayName($n->getStringValue()),
            'driftedProperties' => fn(ParseNode $n) => $o->setDriftedProperties($n->getCollectionOfObjectValues([DriftedProperty::class, 'createFromDiscriminatorValue'])),
            'firstReportedDateTime' => fn(ParseNode $n) => $o->setFirstReportedDateTime($n->getDateTimeValue()),
            'monitorId' => fn(ParseNode $n) => $o->setMonitorId($n->getStringValue()),
            'resourceInstanceIdentifier' => fn(ParseNode $n) => $o->setResourceInstanceIdentifier($n->getObjectValue([OpenComplexDictionaryType::class, 'createFromDiscriminatorValue'])),
            'resourceType' => fn(ParseNode $n) => $o->setResourceType($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(DriftStatus::class)),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the firstReportedDateTime property value. The date and time at which drift is first detected. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @return DateTime|null
    */
    public function getFirstReportedDateTime(): ?DateTime {
        return $this->firstReportedDateTime;
    }

    /**
     * Gets the monitorId property value. Globally unique identifier (GUID) of the monitor. System-generated. Supports $filter (eq, ne).
     * @return string|null
    */
    public function getMonitorId(): ?string {
        return $this->monitorId;
    }

    /**
     * Gets the resourceInstanceIdentifier property value. The resourceInstanceIdentifier property
     * @return OpenComplexDictionaryType|null
    */
    public function getResourceInstanceIdentifier(): ?OpenComplexDictionaryType {
        return $this->resourceInstanceIdentifier;
    }

    /**
     * Gets the resourceType property value. Resource for which the drift is detected. Supports $filter (eq, ne, startsWith).
     * @return string|null
    */
    public function getResourceType(): ?string {
        return $this->resourceType;
    }

    /**
     * Gets the status property value. The status property
     * @return DriftStatus|null
    */
    public function getStatus(): ?DriftStatus {
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
        $writer->writeObjectValue('resourceInstanceIdentifier', $this->getResourceInstanceIdentifier());
        $writer->writeEnumValue('status', $this->getStatus());
    }

    /**
     * Sets the baselineResourceDisplayName property value. Resource instance for which the drift is detected. Supports $filter (eq, ne, startsWith) and $orderby.
     * @param string|null $value Value to set for the baselineResourceDisplayName property.
    */
    public function setBaselineResourceDisplayName(?string $value): void {
        $this->baselineResourceDisplayName = $value;
    }

    /**
     * Sets the driftedProperties property value. Properties within one or more resource instances in which drift is detected. Requires $select to retrieve.
     * @param array<DriftedProperty>|null $value Value to set for the driftedProperties property.
    */
    public function setDriftedProperties(?array $value): void {
        $this->driftedProperties = $value;
    }

    /**
     * Sets the firstReportedDateTime property value. The date and time at which drift is first detected. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ne, ge, le) and $orderby.
     * @param DateTime|null $value Value to set for the firstReportedDateTime property.
    */
    public function setFirstReportedDateTime(?DateTime $value): void {
        $this->firstReportedDateTime = $value;
    }

    /**
     * Sets the monitorId property value. Globally unique identifier (GUID) of the monitor. System-generated. Supports $filter (eq, ne).
     * @param string|null $value Value to set for the monitorId property.
    */
    public function setMonitorId(?string $value): void {
        $this->monitorId = $value;
    }

    /**
     * Sets the resourceInstanceIdentifier property value. The resourceInstanceIdentifier property
     * @param OpenComplexDictionaryType|null $value Value to set for the resourceInstanceIdentifier property.
    */
    public function setResourceInstanceIdentifier(?OpenComplexDictionaryType $value): void {
        $this->resourceInstanceIdentifier = $value;
    }

    /**
     * Sets the resourceType property value. Resource for which the drift is detected. Supports $filter (eq, ne, startsWith).
     * @param string|null $value Value to set for the resourceType property.
    */
    public function setResourceType(?string $value): void {
        $this->resourceType = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param DriftStatus|null $value Value to set for the status property.
    */
    public function setStatus(?DriftStatus $value): void {
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
