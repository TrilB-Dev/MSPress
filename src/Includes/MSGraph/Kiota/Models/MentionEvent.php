<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MentionEvent implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTime|null $eventDateTime The eventDateTime property
    */
    private ?DateTime $eventDateTime = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var IdentitySet|null $speaker The speaker property
    */
    private ?IdentitySet $speaker = null;
    
    /**
     * @var string|null $transcriptUtterance The transcriptUtterance property
    */
    private ?string $transcriptUtterance = null;
    
    /**
     * Instantiates a new MentionEvent and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MentionEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MentionEvent {
        return new MentionEvent();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the eventDateTime property value. The eventDateTime property
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
            'eventDateTime' => fn(ParseNode $n) => $o->setEventDateTime($n->getDateTimeValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'speaker' => fn(ParseNode $n) => $o->setSpeaker($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'transcriptUtterance' => fn(ParseNode $n) => $o->setTranscriptUtterance($n->getStringValue()),
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
     * Gets the speaker property value. The speaker property
     * @return IdentitySet|null
    */
    public function getSpeaker(): ?IdentitySet {
        return $this->speaker;
    }

    /**
     * Gets the transcriptUtterance property value. The transcriptUtterance property
     * @return string|null
    */
    public function getTranscriptUtterance(): ?string {
        return $this->transcriptUtterance;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeDateTimeValue('eventDateTime', $this->getEventDateTime());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('speaker', $this->getSpeaker());
        $writer->writeStringValue('transcriptUtterance', $this->getTranscriptUtterance());
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
     * Sets the eventDateTime property value. The eventDateTime property
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
     * Sets the speaker property value. The speaker property
     * @param IdentitySet|null $value Value to set for the speaker property.
    */
    public function setSpeaker(?IdentitySet $value): void {
        $this->speaker = $value;
    }

    /**
     * Sets the transcriptUtterance property value. The transcriptUtterance property
     * @param string|null $value Value to set for the transcriptUtterance property.
    */
    public function setTranscriptUtterance(?string $value): void {
        $this->transcriptUtterance = $value;
    }

}
