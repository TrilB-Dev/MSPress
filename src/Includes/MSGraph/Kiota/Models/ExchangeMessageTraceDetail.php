<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExchangeMessageTraceDetail extends Entity implements Parsable 
{
    /**
     * @var string|null $action The action taken on the message during the event.
    */
    private ?string $action = null;
    
    /**
     * @var string|null $data Additional data associated with the event, containing supplementary information specific to the event.
    */
    private ?string $data = null;
    
    /**
     * @var DateTime|null $dateTime The date and time when the event occurred. The timestamp is in UTC format.
    */
    private ?DateTime $dateTime = null;
    
    /**
     * @var string|null $description A detailed description that provides context about what happened during message processing.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $event The event that occurred during message processing.
    */
    private ?string $event = null;
    
    /**
     * @var string|null $messageId The Message-ID header field of the message. The format depends on the messaging server that sent the message.
    */
    private ?string $messageId = null;
    
    /**
     * Instantiates a new ExchangeMessageTraceDetail and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExchangeMessageTraceDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExchangeMessageTraceDetail {
        return new ExchangeMessageTraceDetail();
    }

    /**
     * Gets the action property value. The action taken on the message during the event.
     * @return string|null
    */
    public function getAction(): ?string {
        return $this->action;
    }

    /**
     * Gets the data property value. Additional data associated with the event, containing supplementary information specific to the event.
     * @return string|null
    */
    public function getData(): ?string {
        return $this->data;
    }

    /**
     * Gets the dateTime property value. The date and time when the event occurred. The timestamp is in UTC format.
     * @return DateTime|null
    */
    public function getDateTime(): ?DateTime {
        return $this->dateTime;
    }

    /**
     * Gets the description property value. A detailed description that provides context about what happened during message processing.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the event property value. The event that occurred during message processing.
     * @return string|null
    */
    public function getEvent(): ?string {
        return $this->event;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'action' => fn(ParseNode $n) => $o->setAction($n->getStringValue()),
            'data' => fn(ParseNode $n) => $o->setData($n->getStringValue()),
            'dateTime' => fn(ParseNode $n) => $o->setDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'event' => fn(ParseNode $n) => $o->setEvent($n->getStringValue()),
            'messageId' => fn(ParseNode $n) => $o->setMessageId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the messageId property value. The Message-ID header field of the message. The format depends on the messaging server that sent the message.
     * @return string|null
    */
    public function getMessageId(): ?string {
        return $this->messageId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('action', $this->getAction());
        $writer->writeStringValue('data', $this->getData());
        $writer->writeDateTimeValue('dateTime', $this->getDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('event', $this->getEvent());
        $writer->writeStringValue('messageId', $this->getMessageId());
    }

    /**
     * Sets the action property value. The action taken on the message during the event.
     * @param string|null $value Value to set for the action property.
    */
    public function setAction(?string $value): void {
        $this->action = $value;
    }

    /**
     * Sets the data property value. Additional data associated with the event, containing supplementary information specific to the event.
     * @param string|null $value Value to set for the data property.
    */
    public function setData(?string $value): void {
        $this->data = $value;
    }

    /**
     * Sets the dateTime property value. The date and time when the event occurred. The timestamp is in UTC format.
     * @param DateTime|null $value Value to set for the dateTime property.
    */
    public function setDateTime(?DateTime $value): void {
        $this->dateTime = $value;
    }

    /**
     * Sets the description property value. A detailed description that provides context about what happened during message processing.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the event property value. The event that occurred during message processing.
     * @param string|null $value Value to set for the event property.
    */
    public function setEvent(?string $value): void {
        $this->event = $value;
    }

    /**
     * Sets the messageId property value. The Message-ID header field of the message. The format depends on the messaging server that sent the message.
     * @param string|null $value Value to set for the messageId property.
    */
    public function setMessageId(?string $value): void {
        $this->messageId = $value;
    }

}
