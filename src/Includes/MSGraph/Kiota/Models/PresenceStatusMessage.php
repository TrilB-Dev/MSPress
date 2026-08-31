<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PresenceStatusMessage implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTimeTimeZone|null $expiryDateTime Time in which the status message expires.If not provided, the status message doesn't expire.expiryDateTime.dateTime shouldn't include time zone.expiryDateTime isn't available when you request the presence of another user.
    */
    private ?DateTimeTimeZone $expiryDateTime = null;
    
    /**
     * @var ItemBody|null $message Status message item. The only supported format currently is message.contentType = 'text'.
    */
    private ?ItemBody $message = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var DateTime|null $publishedDateTime Time in which the status message was published.Read-only.publishedDateTime isn't available when you request the presence of another user.
    */
    private ?DateTime $publishedDateTime = null;
    
    /**
     * Instantiates a new PresenceStatusMessage and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PresenceStatusMessage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PresenceStatusMessage {
        return new PresenceStatusMessage();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the expiryDateTime property value. Time in which the status message expires.If not provided, the status message doesn't expire.expiryDateTime.dateTime shouldn't include time zone.expiryDateTime isn't available when you request the presence of another user.
     * @return DateTimeTimeZone|null
    */
    public function getExpiryDateTime(): ?DateTimeTimeZone {
        return $this->expiryDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'expiryDateTime' => fn(ParseNode $n) => $o->setExpiryDateTime($n->getObjectValue([DateTimeTimeZone::class, 'createFromDiscriminatorValue'])),
            'message' => fn(ParseNode $n) => $o->setMessage($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'publishedDateTime' => fn(ParseNode $n) => $o->setPublishedDateTime($n->getDateTimeValue()),
        ];
    }

    /**
     * Gets the message property value. Status message item. The only supported format currently is message.contentType = 'text'.
     * @return ItemBody|null
    */
    public function getMessage(): ?ItemBody {
        return $this->message;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the publishedDateTime property value. Time in which the status message was published.Read-only.publishedDateTime isn't available when you request the presence of another user.
     * @return DateTime|null
    */
    public function getPublishedDateTime(): ?DateTime {
        return $this->publishedDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('expiryDateTime', $this->getExpiryDateTime());
        $writer->writeObjectValue('message', $this->getMessage());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeDateTimeValue('publishedDateTime', $this->getPublishedDateTime());
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
     * Sets the expiryDateTime property value. Time in which the status message expires.If not provided, the status message doesn't expire.expiryDateTime.dateTime shouldn't include time zone.expiryDateTime isn't available when you request the presence of another user.
     * @param DateTimeTimeZone|null $value Value to set for the expiryDateTime property.
    */
    public function setExpiryDateTime(?DateTimeTimeZone $value): void {
        $this->expiryDateTime = $value;
    }

    /**
     * Sets the message property value. Status message item. The only supported format currently is message.contentType = 'text'.
     * @param ItemBody|null $value Value to set for the message property.
    */
    public function setMessage(?ItemBody $value): void {
        $this->message = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the publishedDateTime property value. Time in which the status message was published.Read-only.publishedDateTime isn't available when you request the presence of another user.
     * @param DateTime|null $value Value to set for the publishedDateTime property.
    */
    public function setPublishedDateTime(?DateTime $value): void {
        $this->publishedDateTime = $value;
    }

}
