<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SubjectRightsRequestHistory implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var IdentitySet|null $changedBy Identity of the user who changed the  subject rights request.
    */
    private ?IdentitySet $changedBy = null;
    
    /**
     * @var DateTime|null $eventDateTime Data and time when the entity was changed.
    */
    private ?DateTime $eventDateTime = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var SubjectRightsRequestStage|null $stage The stage when the entity was changed.
    */
    private ?SubjectRightsRequestStage $stage = null;
    
    /**
     * @var SubjectRightsRequestStageStatus|null $stageStatus The status of the stage when the entity was changed. The possible values are: notStarted, current, completed, failed, unknownFutureValue.
    */
    private ?SubjectRightsRequestStageStatus $stageStatus = null;
    
    /**
     * @var string|null $type Type of history.
    */
    private ?string $type = null;
    
    /**
     * Instantiates a new SubjectRightsRequestHistory and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SubjectRightsRequestHistory
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SubjectRightsRequestHistory {
        return new SubjectRightsRequestHistory();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the changedBy property value. Identity of the user who changed the  subject rights request.
     * @return IdentitySet|null
    */
    public function getChangedBy(): ?IdentitySet {
        return $this->changedBy;
    }

    /**
     * Gets the eventDateTime property value. Data and time when the entity was changed.
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
            'changedBy' => fn(ParseNode $n) => $o->setChangedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'eventDateTime' => fn(ParseNode $n) => $o->setEventDateTime($n->getDateTimeValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'stage' => fn(ParseNode $n) => $o->setStage($n->getEnumValue(SubjectRightsRequestStage::class)),
            'stageStatus' => fn(ParseNode $n) => $o->setStageStatus($n->getEnumValue(SubjectRightsRequestStageStatus::class)),
            'type' => fn(ParseNode $n) => $o->setType($n->getStringValue()),
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
     * Gets the stage property value. The stage when the entity was changed.
     * @return SubjectRightsRequestStage|null
    */
    public function getStage(): ?SubjectRightsRequestStage {
        return $this->stage;
    }

    /**
     * Gets the stageStatus property value. The status of the stage when the entity was changed. The possible values are: notStarted, current, completed, failed, unknownFutureValue.
     * @return SubjectRightsRequestStageStatus|null
    */
    public function getStageStatus(): ?SubjectRightsRequestStageStatus {
        return $this->stageStatus;
    }

    /**
     * Gets the type property value. Type of history.
     * @return string|null
    */
    public function getType(): ?string {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('changedBy', $this->getChangedBy());
        $writer->writeDateTimeValue('eventDateTime', $this->getEventDateTime());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('stage', $this->getStage());
        $writer->writeEnumValue('stageStatus', $this->getStageStatus());
        $writer->writeStringValue('type', $this->getType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the changedBy property value. Identity of the user who changed the  subject rights request.
     * @param IdentitySet|null $value Value to set for the changedBy property.
    */
    public function setChangedBy(?IdentitySet $value): void {
        $this->changedBy = $value;
    }

    /**
     * Sets the eventDateTime property value. Data and time when the entity was changed.
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
     * Sets the stage property value. The stage when the entity was changed.
     * @param SubjectRightsRequestStage|null $value Value to set for the stage property.
    */
    public function setStage(?SubjectRightsRequestStage $value): void {
        $this->stage = $value;
    }

    /**
     * Sets the stageStatus property value. The status of the stage when the entity was changed. The possible values are: notStarted, current, completed, failed, unknownFutureValue.
     * @param SubjectRightsRequestStageStatus|null $value Value to set for the stageStatus property.
    */
    public function setStageStatus(?SubjectRightsRequestStageStatus $value): void {
        $this->stageStatus = $value;
    }

    /**
     * Sets the type property value. Type of history.
     * @param string|null $value Value to set for the type property.
    */
    public function setType(?string $value): void {
        $this->type = $value;
    }

}
