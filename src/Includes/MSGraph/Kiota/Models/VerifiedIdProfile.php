<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VerifiedIdProfile extends Entity implements Parsable 
{
    /**
     * @var string|null $description Description for the verified ID profile. Required.
    */
    private ?string $description = null;
    
    /**
     * @var FaceCheckConfiguration|null $faceCheckConfiguration The faceCheckConfiguration property
    */
    private ?FaceCheckConfiguration $faceCheckConfiguration = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime DateTime the profile was last modified. Optional.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $name Display name for the verified ID profile. Required.
    */
    private ?string $name = null;
    
    /**
     * @var int|null $priority Defines profile processing priority if multiple profiles are configured. Optional.
    */
    private ?int $priority = null;
    
    /**
     * @var VerifiedIdProfileState|null $state The state property
    */
    private ?VerifiedIdProfileState $state = null;
    
    /**
     * @var VerifiedIdProfileConfiguration|null $verifiedIdProfileConfiguration The verifiedIdProfileConfiguration property
    */
    private ?VerifiedIdProfileConfiguration $verifiedIdProfileConfiguration = null;
    
    /**
     * @var array<VerifiedIdUsageConfiguration>|null $verifiedIdUsageConfigurations Collection defining the usage purpose for the profile. Required.
    */
    private ?array $verifiedIdUsageConfigurations = null;
    
    /**
     * @var string|null $verifierDid Decentralized Identifier (DID) string that represents the verifier in the verifiable credential exchange. Required.
    */
    private ?string $verifierDid = null;
    
    /**
     * Instantiates a new VerifiedIdProfile and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VerifiedIdProfile
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VerifiedIdProfile {
        return new VerifiedIdProfile();
    }

    /**
     * Gets the description property value. Description for the verified ID profile. Required.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the faceCheckConfiguration property value. The faceCheckConfiguration property
     * @return FaceCheckConfiguration|null
    */
    public function getFaceCheckConfiguration(): ?FaceCheckConfiguration {
        return $this->faceCheckConfiguration;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'faceCheckConfiguration' => fn(ParseNode $n) => $o->setFaceCheckConfiguration($n->getObjectValue([FaceCheckConfiguration::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'priority' => fn(ParseNode $n) => $o->setPriority($n->getIntegerValue()),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(VerifiedIdProfileState::class)),
            'verifiedIdProfileConfiguration' => fn(ParseNode $n) => $o->setVerifiedIdProfileConfiguration($n->getObjectValue([VerifiedIdProfileConfiguration::class, 'createFromDiscriminatorValue'])),
            'verifiedIdUsageConfigurations' => fn(ParseNode $n) => $o->setVerifiedIdUsageConfigurations($n->getCollectionOfObjectValues([VerifiedIdUsageConfiguration::class, 'createFromDiscriminatorValue'])),
            'verifierDid' => fn(ParseNode $n) => $o->setVerifierDid($n->getStringValue()),
        ]);
    }

    /**
     * Gets the lastModifiedDateTime property value. DateTime the profile was last modified. Optional.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the name property value. Display name for the verified ID profile. Required.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the priority property value. Defines profile processing priority if multiple profiles are configured. Optional.
     * @return int|null
    */
    public function getPriority(): ?int {
        return $this->priority;
    }

    /**
     * Gets the state property value. The state property
     * @return VerifiedIdProfileState|null
    */
    public function getState(): ?VerifiedIdProfileState {
        return $this->state;
    }

    /**
     * Gets the verifiedIdProfileConfiguration property value. The verifiedIdProfileConfiguration property
     * @return VerifiedIdProfileConfiguration|null
    */
    public function getVerifiedIdProfileConfiguration(): ?VerifiedIdProfileConfiguration {
        return $this->verifiedIdProfileConfiguration;
    }

    /**
     * Gets the verifiedIdUsageConfigurations property value. Collection defining the usage purpose for the profile. Required.
     * @return array<VerifiedIdUsageConfiguration>|null
    */
    public function getVerifiedIdUsageConfigurations(): ?array {
        return $this->verifiedIdUsageConfigurations;
    }

    /**
     * Gets the verifierDid property value. Decentralized Identifier (DID) string that represents the verifier in the verifiable credential exchange. Required.
     * @return string|null
    */
    public function getVerifierDid(): ?string {
        return $this->verifierDid;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeObjectValue('faceCheckConfiguration', $this->getFaceCheckConfiguration());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeIntegerValue('priority', $this->getPriority());
        $writer->writeEnumValue('state', $this->getState());
        $writer->writeObjectValue('verifiedIdProfileConfiguration', $this->getVerifiedIdProfileConfiguration());
        $writer->writeCollectionOfObjectValues('verifiedIdUsageConfigurations', $this->getVerifiedIdUsageConfigurations());
        $writer->writeStringValue('verifierDid', $this->getVerifierDid());
    }

    /**
     * Sets the description property value. Description for the verified ID profile. Required.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the faceCheckConfiguration property value. The faceCheckConfiguration property
     * @param FaceCheckConfiguration|null $value Value to set for the faceCheckConfiguration property.
    */
    public function setFaceCheckConfiguration(?FaceCheckConfiguration $value): void {
        $this->faceCheckConfiguration = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. DateTime the profile was last modified. Optional.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the name property value. Display name for the verified ID profile. Required.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the priority property value. Defines profile processing priority if multiple profiles are configured. Optional.
     * @param int|null $value Value to set for the priority property.
    */
    public function setPriority(?int $value): void {
        $this->priority = $value;
    }

    /**
     * Sets the state property value. The state property
     * @param VerifiedIdProfileState|null $value Value to set for the state property.
    */
    public function setState(?VerifiedIdProfileState $value): void {
        $this->state = $value;
    }

    /**
     * Sets the verifiedIdProfileConfiguration property value. The verifiedIdProfileConfiguration property
     * @param VerifiedIdProfileConfiguration|null $value Value to set for the verifiedIdProfileConfiguration property.
    */
    public function setVerifiedIdProfileConfiguration(?VerifiedIdProfileConfiguration $value): void {
        $this->verifiedIdProfileConfiguration = $value;
    }

    /**
     * Sets the verifiedIdUsageConfigurations property value. Collection defining the usage purpose for the profile. Required.
     * @param array<VerifiedIdUsageConfiguration>|null $value Value to set for the verifiedIdUsageConfigurations property.
    */
    public function setVerifiedIdUsageConfigurations(?array $value): void {
        $this->verifiedIdUsageConfigurations = $value;
    }

    /**
     * Sets the verifierDid property value. Decentralized Identifier (DID) string that represents the verifier in the verifiable credential exchange. Required.
     * @param string|null $value Value to set for the verifierDid property.
    */
    public function setVerifierDid(?string $value): void {
        $this->verifierDid = $value;
    }

}
