<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class TimeCardEvent implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTime|null $dateTime The time the entry is recorded.
    */
    private ?DateTime $dateTime = null;
    
    /**
     * @var bool|null $isAtApprovedLocation Indicates whether this action happens at an approved location.
    */
    private ?bool $isAtApprovedLocation = null;
    
    /**
     * @var ItemBody|null $notes Notes about the timeCardEvent.
    */
    private ?ItemBody $notes = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new TimeCardEvent and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TimeCardEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TimeCardEvent {
        return new TimeCardEvent();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dateTime property value. The time the entry is recorded.
     * @return DateTime|null
    */
    public function getDateTime(): ?DateTime {
        return $this->dateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dateTime' => fn(ParseNode $n) => $o->setDateTime($n->getDateTimeValue()),
            'isAtApprovedLocation' => fn(ParseNode $n) => $o->setIsAtApprovedLocation($n->getBooleanValue()),
            'notes' => fn(ParseNode $n) => $o->setNotes($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isAtApprovedLocation property value. Indicates whether this action happens at an approved location.
     * @return bool|null
    */
    public function getIsAtApprovedLocation(): ?bool {
        return $this->isAtApprovedLocation;
    }

    /**
     * Gets the notes property value. Notes about the timeCardEvent.
     * @return ItemBody|null
    */
    public function getNotes(): ?ItemBody {
        return $this->notes;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeDateTimeValue('dateTime', $this->getDateTime());
        $writer->writeBooleanValue('isAtApprovedLocation', $this->getIsAtApprovedLocation());
        $writer->writeObjectValue('notes', $this->getNotes());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the dateTime property value. The time the entry is recorded.
     * @param DateTime|null $value Value to set for the dateTime property.
    */
    public function setDateTime(?DateTime $value): void {
        $this->dateTime = $value;
    }

    /**
     * Sets the isAtApprovedLocation property value. Indicates whether this action happens at an approved location.
     * @param bool|null $value Value to set for the isAtApprovedLocation property.
    */
    public function setIsAtApprovedLocation(?bool $value): void {
        $this->isAtApprovedLocation = $value;
    }

    /**
     * Sets the notes property value. Notes about the timeCardEvent.
     * @param ItemBody|null $value Value to set for the notes property.
    */
    public function setNotes(?ItemBody $value): void {
        $this->notes = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
