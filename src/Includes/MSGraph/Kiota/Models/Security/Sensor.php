<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class Sensor extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $createdDateTime The date and time when the sensor was generated. The Timestamp represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var DeploymentStatus|null $deploymentStatus The deploymentStatus property
    */
    private ?DeploymentStatus $deploymentStatus = null;
    
    /**
     * @var string|null $displayName The display name of the sensor.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $domainName The fully qualified domain name of the sensor.
    */
    private ?string $domainName = null;
    
    /**
     * @var array<HealthIssue>|null $healthIssues Represents potential issues within a customer's Microsoft Defender for Identity configuration that Microsoft Defender for Identity identified related to the sensor.
    */
    private ?array $healthIssues = null;
    
    /**
     * @var SensorHealthStatus|null $healthStatus The healthStatus property
    */
    private ?SensorHealthStatus $healthStatus = null;
    
    /**
     * @var int|null $openHealthIssuesCount This field displays the count of health issues related to this sensor.
    */
    private ?int $openHealthIssuesCount = null;
    
    /**
     * @var SensorType|null $sensorType The sensorType property
    */
    private ?SensorType $sensorType = null;
    
    /**
     * @var ServiceStatus|null $serviceStatus The serviceStatus property
    */
    private ?ServiceStatus $serviceStatus = null;
    
    /**
     * @var SensorSettings|null $settings The settings property
    */
    private ?SensorSettings $settings = null;
    
    /**
     * @var string|null $version The version of the sensor.
    */
    private ?string $version = null;
    
    /**
     * Instantiates a new Sensor and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Sensor
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Sensor {
        return new Sensor();
    }

    /**
     * Gets the createdDateTime property value. The date and time when the sensor was generated. The Timestamp represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the deploymentStatus property value. The deploymentStatus property
     * @return DeploymentStatus|null
    */
    public function getDeploymentStatus(): ?DeploymentStatus {
        return $this->deploymentStatus;
    }

    /**
     * Gets the displayName property value. The display name of the sensor.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the domainName property value. The fully qualified domain name of the sensor.
     * @return string|null
    */
    public function getDomainName(): ?string {
        return $this->domainName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'deploymentStatus' => fn(ParseNode $n) => $o->setDeploymentStatus($n->getEnumValue(DeploymentStatus::class)),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'domainName' => fn(ParseNode $n) => $o->setDomainName($n->getStringValue()),
            'healthIssues' => fn(ParseNode $n) => $o->setHealthIssues($n->getCollectionOfObjectValues([HealthIssue::class, 'createFromDiscriminatorValue'])),
            'healthStatus' => fn(ParseNode $n) => $o->setHealthStatus($n->getEnumValue(SensorHealthStatus::class)),
            'openHealthIssuesCount' => fn(ParseNode $n) => $o->setOpenHealthIssuesCount($n->getIntegerValue()),
            'sensorType' => fn(ParseNode $n) => $o->setSensorType($n->getEnumValue(SensorType::class)),
            'serviceStatus' => fn(ParseNode $n) => $o->setServiceStatus($n->getEnumValue(ServiceStatus::class)),
            'settings' => fn(ParseNode $n) => $o->setSettings($n->getObjectValue([SensorSettings::class, 'createFromDiscriminatorValue'])),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getStringValue()),
        ]);
    }

    /**
     * Gets the healthIssues property value. Represents potential issues within a customer's Microsoft Defender for Identity configuration that Microsoft Defender for Identity identified related to the sensor.
     * @return array<HealthIssue>|null
    */
    public function getHealthIssues(): ?array {
        return $this->healthIssues;
    }

    /**
     * Gets the healthStatus property value. The healthStatus property
     * @return SensorHealthStatus|null
    */
    public function getHealthStatus(): ?SensorHealthStatus {
        return $this->healthStatus;
    }

    /**
     * Gets the openHealthIssuesCount property value. This field displays the count of health issues related to this sensor.
     * @return int|null
    */
    public function getOpenHealthIssuesCount(): ?int {
        return $this->openHealthIssuesCount;
    }

    /**
     * Gets the sensorType property value. The sensorType property
     * @return SensorType|null
    */
    public function getSensorType(): ?SensorType {
        return $this->sensorType;
    }

    /**
     * Gets the serviceStatus property value. The serviceStatus property
     * @return ServiceStatus|null
    */
    public function getServiceStatus(): ?ServiceStatus {
        return $this->serviceStatus;
    }

    /**
     * Gets the settings property value. The settings property
     * @return SensorSettings|null
    */
    public function getSettings(): ?SensorSettings {
        return $this->settings;
    }

    /**
     * Gets the version property value. The version of the sensor.
     * @return string|null
    */
    public function getVersion(): ?string {
        return $this->version;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeEnumValue('deploymentStatus', $this->getDeploymentStatus());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('domainName', $this->getDomainName());
        $writer->writeCollectionOfObjectValues('healthIssues', $this->getHealthIssues());
        $writer->writeEnumValue('healthStatus', $this->getHealthStatus());
        $writer->writeIntegerValue('openHealthIssuesCount', $this->getOpenHealthIssuesCount());
        $writer->writeEnumValue('sensorType', $this->getSensorType());
        $writer->writeEnumValue('serviceStatus', $this->getServiceStatus());
        $writer->writeObjectValue('settings', $this->getSettings());
        $writer->writeStringValue('version', $this->getVersion());
    }

    /**
     * Sets the createdDateTime property value. The date and time when the sensor was generated. The Timestamp represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the deploymentStatus property value. The deploymentStatus property
     * @param DeploymentStatus|null $value Value to set for the deploymentStatus property.
    */
    public function setDeploymentStatus(?DeploymentStatus $value): void {
        $this->deploymentStatus = $value;
    }

    /**
     * Sets the displayName property value. The display name of the sensor.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the domainName property value. The fully qualified domain name of the sensor.
     * @param string|null $value Value to set for the domainName property.
    */
    public function setDomainName(?string $value): void {
        $this->domainName = $value;
    }

    /**
     * Sets the healthIssues property value. Represents potential issues within a customer's Microsoft Defender for Identity configuration that Microsoft Defender for Identity identified related to the sensor.
     * @param array<HealthIssue>|null $value Value to set for the healthIssues property.
    */
    public function setHealthIssues(?array $value): void {
        $this->healthIssues = $value;
    }

    /**
     * Sets the healthStatus property value. The healthStatus property
     * @param SensorHealthStatus|null $value Value to set for the healthStatus property.
    */
    public function setHealthStatus(?SensorHealthStatus $value): void {
        $this->healthStatus = $value;
    }

    /**
     * Sets the openHealthIssuesCount property value. This field displays the count of health issues related to this sensor.
     * @param int|null $value Value to set for the openHealthIssuesCount property.
    */
    public function setOpenHealthIssuesCount(?int $value): void {
        $this->openHealthIssuesCount = $value;
    }

    /**
     * Sets the sensorType property value. The sensorType property
     * @param SensorType|null $value Value to set for the sensorType property.
    */
    public function setSensorType(?SensorType $value): void {
        $this->sensorType = $value;
    }

    /**
     * Sets the serviceStatus property value. The serviceStatus property
     * @param ServiceStatus|null $value Value to set for the serviceStatus property.
    */
    public function setServiceStatus(?ServiceStatus $value): void {
        $this->serviceStatus = $value;
    }

    /**
     * Sets the settings property value. The settings property
     * @param SensorSettings|null $value Value to set for the settings property.
    */
    public function setSettings(?SensorSettings $value): void {
        $this->settings = $value;
    }

    /**
     * Sets the version property value. The version of the sensor.
     * @param string|null $value Value to set for the version property.
    */
    public function setVersion(?string $value): void {
        $this->version = $value;
    }

}
