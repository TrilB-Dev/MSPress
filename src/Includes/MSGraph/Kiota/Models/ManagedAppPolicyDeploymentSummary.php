<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The ManagedAppEntity is the base entity type for all other entity types under app management workflow.
*/
class ManagedAppPolicyDeploymentSummary extends Entity implements Parsable 
{
    /**
     * @var int|null $configurationDeployedUserCount The configurationDeployedUserCount property
    */
    private ?int $configurationDeployedUserCount = null;
    
    /**
     * @var array<ManagedAppPolicyDeploymentSummaryPerApp>|null $configurationDeploymentSummaryPerApp The configurationDeploymentSummaryPerApp property
    */
    private ?array $configurationDeploymentSummaryPerApp = null;
    
    /**
     * @var string|null $displayName The displayName property
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $lastRefreshTime The lastRefreshTime property
    */
    private ?DateTime $lastRefreshTime = null;
    
    /**
     * @var string|null $version Version of the entity.
    */
    private ?string $version = null;
    
    /**
     * Instantiates a new ManagedAppPolicyDeploymentSummary and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ManagedAppPolicyDeploymentSummary
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ManagedAppPolicyDeploymentSummary {
        return new ManagedAppPolicyDeploymentSummary();
    }

    /**
     * Gets the configurationDeployedUserCount property value. The configurationDeployedUserCount property
     * @return int|null
    */
    public function getConfigurationDeployedUserCount(): ?int {
        return $this->configurationDeployedUserCount;
    }

    /**
     * Gets the configurationDeploymentSummaryPerApp property value. The configurationDeploymentSummaryPerApp property
     * @return array<ManagedAppPolicyDeploymentSummaryPerApp>|null
    */
    public function getConfigurationDeploymentSummaryPerApp(): ?array {
        return $this->configurationDeploymentSummaryPerApp;
    }

    /**
     * Gets the displayName property value. The displayName property
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
            'configurationDeployedUserCount' => fn(ParseNode $n) => $o->setConfigurationDeployedUserCount($n->getIntegerValue()),
            'configurationDeploymentSummaryPerApp' => fn(ParseNode $n) => $o->setConfigurationDeploymentSummaryPerApp($n->getCollectionOfObjectValues([ManagedAppPolicyDeploymentSummaryPerApp::class, 'createFromDiscriminatorValue'])),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'lastRefreshTime' => fn(ParseNode $n) => $o->setLastRefreshTime($n->getDateTimeValue()),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getStringValue()),
        ]);
    }

    /**
     * Gets the lastRefreshTime property value. The lastRefreshTime property
     * @return DateTime|null
    */
    public function getLastRefreshTime(): ?DateTime {
        return $this->lastRefreshTime;
    }

    /**
     * Gets the version property value. Version of the entity.
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
        $writer->writeIntegerValue('configurationDeployedUserCount', $this->getConfigurationDeployedUserCount());
        $writer->writeCollectionOfObjectValues('configurationDeploymentSummaryPerApp', $this->getConfigurationDeploymentSummaryPerApp());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('lastRefreshTime', $this->getLastRefreshTime());
        $writer->writeStringValue('version', $this->getVersion());
    }

    /**
     * Sets the configurationDeployedUserCount property value. The configurationDeployedUserCount property
     * @param int|null $value Value to set for the configurationDeployedUserCount property.
    */
    public function setConfigurationDeployedUserCount(?int $value): void {
        $this->configurationDeployedUserCount = $value;
    }

    /**
     * Sets the configurationDeploymentSummaryPerApp property value. The configurationDeploymentSummaryPerApp property
     * @param array<ManagedAppPolicyDeploymentSummaryPerApp>|null $value Value to set for the configurationDeploymentSummaryPerApp property.
    */
    public function setConfigurationDeploymentSummaryPerApp(?array $value): void {
        $this->configurationDeploymentSummaryPerApp = $value;
    }

    /**
     * Sets the displayName property value. The displayName property
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the lastRefreshTime property value. The lastRefreshTime property
     * @param DateTime|null $value Value to set for the lastRefreshTime property.
    */
    public function setLastRefreshTime(?DateTime $value): void {
        $this->lastRefreshTime = $value;
    }

    /**
     * Sets the version property value. Version of the entity.
     * @param string|null $value Value to set for the version property.
    */
    public function setVersion(?string $value): void {
        $this->version = $value;
    }

}
