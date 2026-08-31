<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EmergencyCallEvent extends CallEvent implements Parsable 
{
    /**
     * @var EmergencyCallerInfo|null $callerInfo The information of the emergency caller.
    */
    private ?EmergencyCallerInfo $callerInfo = null;
    
    /**
     * @var string|null $emergencyNumberDialed The emergency number dialed.
    */
    private ?string $emergencyNumberDialed = null;
    
    /**
     * @var string|null $policyName The policy name for the emergency call event.
    */
    private ?string $policyName = null;
    
    /**
     * Instantiates a new EmergencyCallEvent and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EmergencyCallEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EmergencyCallEvent {
        return new EmergencyCallEvent();
    }

    /**
     * Gets the callerInfo property value. The information of the emergency caller.
     * @return EmergencyCallerInfo|null
    */
    public function getCallerInfo(): ?EmergencyCallerInfo {
        return $this->callerInfo;
    }

    /**
     * Gets the emergencyNumberDialed property value. The emergency number dialed.
     * @return string|null
    */
    public function getEmergencyNumberDialed(): ?string {
        return $this->emergencyNumberDialed;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'callerInfo' => fn(ParseNode $n) => $o->setCallerInfo($n->getObjectValue([EmergencyCallerInfo::class, 'createFromDiscriminatorValue'])),
            'emergencyNumberDialed' => fn(ParseNode $n) => $o->setEmergencyNumberDialed($n->getStringValue()),
            'policyName' => fn(ParseNode $n) => $o->setPolicyName($n->getStringValue()),
        ]);
    }

    /**
     * Gets the policyName property value. The policy name for the emergency call event.
     * @return string|null
    */
    public function getPolicyName(): ?string {
        return $this->policyName;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('callerInfo', $this->getCallerInfo());
        $writer->writeStringValue('emergencyNumberDialed', $this->getEmergencyNumberDialed());
        $writer->writeStringValue('policyName', $this->getPolicyName());
    }

    /**
     * Sets the callerInfo property value. The information of the emergency caller.
     * @param EmergencyCallerInfo|null $value Value to set for the callerInfo property.
    */
    public function setCallerInfo(?EmergencyCallerInfo $value): void {
        $this->callerInfo = $value;
    }

    /**
     * Sets the emergencyNumberDialed property value. The emergency number dialed.
     * @param string|null $value Value to set for the emergencyNumberDialed property.
    */
    public function setEmergencyNumberDialed(?string $value): void {
        $this->emergencyNumberDialed = $value;
    }

    /**
     * Sets the policyName property value. The policy name for the emergency call event.
     * @param string|null $value Value to set for the policyName property.
    */
    public function setPolicyName(?string $value): void {
        $this->policyName = $value;
    }

}
