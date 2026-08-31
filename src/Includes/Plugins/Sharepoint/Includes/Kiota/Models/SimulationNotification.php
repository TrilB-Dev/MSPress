<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SimulationNotification extends BaseEndUserNotification implements Parsable 
{
    /**
     * @var TargettedUserType|null $targettedUserType Target user type. The possible values are: unknown, clicked, compromised, allUsers, unknownFutureValue.
    */
    private ?TargettedUserType $targettedUserType = null;
    
    /**
     * Instantiates a new SimulationNotification and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.simulationNotification');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SimulationNotification
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SimulationNotification {
        return new SimulationNotification();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'targettedUserType' => fn(ParseNode $n) => $o->setTargettedUserType($n->getEnumValue(TargettedUserType::class)),
        ]);
    }

    /**
     * Gets the targettedUserType property value. Target user type. The possible values are: unknown, clicked, compromised, allUsers, unknownFutureValue.
     * @return TargettedUserType|null
    */
    public function getTargettedUserType(): ?TargettedUserType {
        return $this->targettedUserType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('targettedUserType', $this->getTargettedUserType());
    }

    /**
     * Sets the targettedUserType property value. Target user type. The possible values are: unknown, clicked, compromised, allUsers, unknownFutureValue.
     * @param TargettedUserType|null $value Value to set for the targettedUserType property.
    */
    public function setTargettedUserType(?TargettedUserType $value): void {
        $this->targettedUserType = $value;
    }

}
