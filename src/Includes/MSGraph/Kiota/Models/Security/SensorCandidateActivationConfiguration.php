<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class SensorCandidateActivationConfiguration extends Entity implements Parsable 
{
    /**
     * @var SensorCandidateActivationMode|null $activationMode The activationMode property
    */
    private ?SensorCandidateActivationMode $activationMode = null;
    
    /**
     * Instantiates a new SensorCandidateActivationConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SensorCandidateActivationConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SensorCandidateActivationConfiguration {
        return new SensorCandidateActivationConfiguration();
    }

    /**
     * Gets the activationMode property value. The activationMode property
     * @return SensorCandidateActivationMode|null
    */
    public function getActivationMode(): ?SensorCandidateActivationMode {
        return $this->activationMode;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activationMode' => fn(ParseNode $n) => $o->setActivationMode($n->getEnumValue(SensorCandidateActivationMode::class)),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('activationMode', $this->getActivationMode());
    }

    /**
     * Sets the activationMode property value. The activationMode property
     * @param SensorCandidateActivationMode|null $value Value to set for the activationMode property.
    */
    public function setActivationMode(?SensorCandidateActivationMode $value): void {
        $this->activationMode = $value;
    }

}
