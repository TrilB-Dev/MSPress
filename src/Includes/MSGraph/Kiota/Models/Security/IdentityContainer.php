<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class IdentityContainer extends Entity implements Parsable 
{
    /**
     * @var array<HealthIssue>|null $healthIssues Represents potential issues identified by Microsoft Defender for Identity within a customer's Microsoft Defender for Identity configuration.
    */
    private ?array $healthIssues = null;
    
    /**
     * @var array<IdentityAccounts>|null $identityAccounts Represents an identity's details in the context of Microsoft Defender for Identity.
    */
    private ?array $identityAccounts = null;
    
    /**
     * @var SensorCandidateActivationConfiguration|null $sensorCandidateActivationConfiguration The sensorCandidateActivationConfiguration property
    */
    private ?SensorCandidateActivationConfiguration $sensorCandidateActivationConfiguration = null;
    
    /**
     * @var array<SensorCandidate>|null $sensorCandidates Represents Microsoft Defender for Identity sensors that are ready to be activated.
    */
    private ?array $sensorCandidates = null;
    
    /**
     * @var array<Sensor>|null $sensors Represents a customer's Microsoft Defender for Identity sensors.
    */
    private ?array $sensors = null;
    
    /**
     * @var SettingsContainer|null $settings Represents a container for security identities settings APIs.
    */
    private ?SettingsContainer $settings = null;
    
    /**
     * Instantiates a new IdentityContainer and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IdentityContainer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IdentityContainer {
        return new IdentityContainer();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'healthIssues' => fn(ParseNode $n) => $o->setHealthIssues($n->getCollectionOfObjectValues([HealthIssue::class, 'createFromDiscriminatorValue'])),
            'identityAccounts' => fn(ParseNode $n) => $o->setIdentityAccounts($n->getCollectionOfObjectValues([IdentityAccounts::class, 'createFromDiscriminatorValue'])),
            'sensorCandidateActivationConfiguration' => fn(ParseNode $n) => $o->setSensorCandidateActivationConfiguration($n->getObjectValue([SensorCandidateActivationConfiguration::class, 'createFromDiscriminatorValue'])),
            'sensorCandidates' => fn(ParseNode $n) => $o->setSensorCandidates($n->getCollectionOfObjectValues([SensorCandidate::class, 'createFromDiscriminatorValue'])),
            'sensors' => fn(ParseNode $n) => $o->setSensors($n->getCollectionOfObjectValues([Sensor::class, 'createFromDiscriminatorValue'])),
            'settings' => fn(ParseNode $n) => $o->setSettings($n->getObjectValue([SettingsContainer::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the healthIssues property value. Represents potential issues identified by Microsoft Defender for Identity within a customer's Microsoft Defender for Identity configuration.
     * @return array<HealthIssue>|null
    */
    public function getHealthIssues(): ?array {
        return $this->healthIssues;
    }

    /**
     * Gets the identityAccounts property value. Represents an identity's details in the context of Microsoft Defender for Identity.
     * @return array<IdentityAccounts>|null
    */
    public function getIdentityAccounts(): ?array {
        return $this->identityAccounts;
    }

    /**
     * Gets the sensorCandidateActivationConfiguration property value. The sensorCandidateActivationConfiguration property
     * @return SensorCandidateActivationConfiguration|null
    */
    public function getSensorCandidateActivationConfiguration(): ?SensorCandidateActivationConfiguration {
        return $this->sensorCandidateActivationConfiguration;
    }

    /**
     * Gets the sensorCandidates property value. Represents Microsoft Defender for Identity sensors that are ready to be activated.
     * @return array<SensorCandidate>|null
    */
    public function getSensorCandidates(): ?array {
        return $this->sensorCandidates;
    }

    /**
     * Gets the sensors property value. Represents a customer's Microsoft Defender for Identity sensors.
     * @return array<Sensor>|null
    */
    public function getSensors(): ?array {
        return $this->sensors;
    }

    /**
     * Gets the settings property value. Represents a container for security identities settings APIs.
     * @return SettingsContainer|null
    */
    public function getSettings(): ?SettingsContainer {
        return $this->settings;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('healthIssues', $this->getHealthIssues());
        $writer->writeCollectionOfObjectValues('identityAccounts', $this->getIdentityAccounts());
        $writer->writeObjectValue('sensorCandidateActivationConfiguration', $this->getSensorCandidateActivationConfiguration());
        $writer->writeCollectionOfObjectValues('sensorCandidates', $this->getSensorCandidates());
        $writer->writeCollectionOfObjectValues('sensors', $this->getSensors());
        $writer->writeObjectValue('settings', $this->getSettings());
    }

    /**
     * Sets the healthIssues property value. Represents potential issues identified by Microsoft Defender for Identity within a customer's Microsoft Defender for Identity configuration.
     * @param array<HealthIssue>|null $value Value to set for the healthIssues property.
    */
    public function setHealthIssues(?array $value): void {
        $this->healthIssues = $value;
    }

    /**
     * Sets the identityAccounts property value. Represents an identity's details in the context of Microsoft Defender for Identity.
     * @param array<IdentityAccounts>|null $value Value to set for the identityAccounts property.
    */
    public function setIdentityAccounts(?array $value): void {
        $this->identityAccounts = $value;
    }

    /**
     * Sets the sensorCandidateActivationConfiguration property value. The sensorCandidateActivationConfiguration property
     * @param SensorCandidateActivationConfiguration|null $value Value to set for the sensorCandidateActivationConfiguration property.
    */
    public function setSensorCandidateActivationConfiguration(?SensorCandidateActivationConfiguration $value): void {
        $this->sensorCandidateActivationConfiguration = $value;
    }

    /**
     * Sets the sensorCandidates property value. Represents Microsoft Defender for Identity sensors that are ready to be activated.
     * @param array<SensorCandidate>|null $value Value to set for the sensorCandidates property.
    */
    public function setSensorCandidates(?array $value): void {
        $this->sensorCandidates = $value;
    }

    /**
     * Sets the sensors property value. Represents a customer's Microsoft Defender for Identity sensors.
     * @param array<Sensor>|null $value Value to set for the sensors property.
    */
    public function setSensors(?array $value): void {
        $this->sensors = $value;
    }

    /**
     * Sets the settings property value. Represents a container for security identities settings APIs.
     * @param SettingsContainer|null $value Value to set for the settings property.
    */
    public function setSettings(?SettingsContainer $value): void {
        $this->settings = $value;
    }

}
