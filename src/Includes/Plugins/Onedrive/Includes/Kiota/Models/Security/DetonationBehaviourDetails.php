<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DetonationBehaviourDetails implements AdditionalDataHolder, Parsable 
{
    /**
     * @var string|null $actionStatus The status of the action performed during detonation (e.g., 'Successful', 'Failed', 'Blocked').
    */
    private ?string $actionStatus = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $behaviourCapability Categorizes the capability or type of behavior observed.
    */
    private ?string $behaviourCapability = null;
    
    /**
     * @var string|null $behaviourGroup Groups related behaviors together for classification purposes.
    */
    private ?string $behaviourGroup = null;
    
    /**
     * @var string|null $details More contextual information about the observed behavior or action.
    */
    private ?string $details = null;
    
    /**
     * @var DateTime|null $eventDateTime The date and time when the behavior or action was observed during detonation.
    */
    private ?DateTime $eventDateTime = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $operation The specific operation or action that was performed.
    */
    private ?string $operation = null;
    
    /**
     * @var string|null $processId The unique identifier of the process involved in the behavior.
    */
    private ?string $processId = null;
    
    /**
     * @var string|null $processName The name of the process that performed or was involved in the behavior.
    */
    private ?string $processName = null;
    
    /**
     * @var string|null $target The target of the operation.
    */
    private ?string $target = null;
    
    /**
     * Instantiates a new DetonationBehaviourDetails and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DetonationBehaviourDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DetonationBehaviourDetails {
        return new DetonationBehaviourDetails();
    }

    /**
     * Gets the actionStatus property value. The status of the action performed during detonation (e.g., 'Successful', 'Failed', 'Blocked').
     * @return string|null
    */
    public function getActionStatus(): ?string {
        return $this->actionStatus;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the behaviourCapability property value. Categorizes the capability or type of behavior observed.
     * @return string|null
    */
    public function getBehaviourCapability(): ?string {
        return $this->behaviourCapability;
    }

    /**
     * Gets the behaviourGroup property value. Groups related behaviors together for classification purposes.
     * @return string|null
    */
    public function getBehaviourGroup(): ?string {
        return $this->behaviourGroup;
    }

    /**
     * Gets the details property value. More contextual information about the observed behavior or action.
     * @return string|null
    */
    public function getDetails(): ?string {
        return $this->details;
    }

    /**
     * Gets the eventDateTime property value. The date and time when the behavior or action was observed during detonation.
     * @return DateTime|null
    */
    public function getEventDateTime(): ?DateTime {
        return $this->eventDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'actionStatus' => fn(ParseNode $n) => $o->setActionStatus($n->getStringValue()),
            'behaviourCapability' => fn(ParseNode $n) => $o->setBehaviourCapability($n->getStringValue()),
            'behaviourGroup' => fn(ParseNode $n) => $o->setBehaviourGroup($n->getStringValue()),
            'details' => fn(ParseNode $n) => $o->setDetails($n->getStringValue()),
            'eventDateTime' => fn(ParseNode $n) => $o->setEventDateTime($n->getDateTimeValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'operation' => fn(ParseNode $n) => $o->setOperation($n->getStringValue()),
            'processId' => fn(ParseNode $n) => $o->setProcessId($n->getStringValue()),
            'processName' => fn(ParseNode $n) => $o->setProcessName($n->getStringValue()),
            'target' => fn(ParseNode $n) => $o->setTarget($n->getStringValue()),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the operation property value. The specific operation or action that was performed.
     * @return string|null
    */
    public function getOperation(): ?string {
        return $this->operation;
    }

    /**
     * Gets the processId property value. The unique identifier of the process involved in the behavior.
     * @return string|null
    */
    public function getProcessId(): ?string {
        return $this->processId;
    }

    /**
     * Gets the processName property value. The name of the process that performed or was involved in the behavior.
     * @return string|null
    */
    public function getProcessName(): ?string {
        return $this->processName;
    }

    /**
     * Gets the target property value. The target of the operation.
     * @return string|null
    */
    public function getTarget(): ?string {
        return $this->target;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('actionStatus', $this->getActionStatus());
        $writer->writeStringValue('behaviourCapability', $this->getBehaviourCapability());
        $writer->writeStringValue('behaviourGroup', $this->getBehaviourGroup());
        $writer->writeStringValue('details', $this->getDetails());
        $writer->writeDateTimeValue('eventDateTime', $this->getEventDateTime());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('operation', $this->getOperation());
        $writer->writeStringValue('processId', $this->getProcessId());
        $writer->writeStringValue('processName', $this->getProcessName());
        $writer->writeStringValue('target', $this->getTarget());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the actionStatus property value. The status of the action performed during detonation (e.g., 'Successful', 'Failed', 'Blocked').
     * @param string|null $value Value to set for the actionStatus property.
    */
    public function setActionStatus(?string $value): void {
        $this->actionStatus = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the behaviourCapability property value. Categorizes the capability or type of behavior observed.
     * @param string|null $value Value to set for the behaviourCapability property.
    */
    public function setBehaviourCapability(?string $value): void {
        $this->behaviourCapability = $value;
    }

    /**
     * Sets the behaviourGroup property value. Groups related behaviors together for classification purposes.
     * @param string|null $value Value to set for the behaviourGroup property.
    */
    public function setBehaviourGroup(?string $value): void {
        $this->behaviourGroup = $value;
    }

    /**
     * Sets the details property value. More contextual information about the observed behavior or action.
     * @param string|null $value Value to set for the details property.
    */
    public function setDetails(?string $value): void {
        $this->details = $value;
    }

    /**
     * Sets the eventDateTime property value. The date and time when the behavior or action was observed during detonation.
     * @param DateTime|null $value Value to set for the eventDateTime property.
    */
    public function setEventDateTime(?DateTime $value): void {
        $this->eventDateTime = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the operation property value. The specific operation or action that was performed.
     * @param string|null $value Value to set for the operation property.
    */
    public function setOperation(?string $value): void {
        $this->operation = $value;
    }

    /**
     * Sets the processId property value. The unique identifier of the process involved in the behavior.
     * @param string|null $value Value to set for the processId property.
    */
    public function setProcessId(?string $value): void {
        $this->processId = $value;
    }

    /**
     * Sets the processName property value. The name of the process that performed or was involved in the behavior.
     * @param string|null $value Value to set for the processName property.
    */
    public function setProcessName(?string $value): void {
        $this->processName = $value;
    }

    /**
     * Sets the target property value. The target of the operation.
     * @param string|null $value Value to set for the target property.
    */
    public function setTarget(?string $value): void {
        $this->target = $value;
    }

}
