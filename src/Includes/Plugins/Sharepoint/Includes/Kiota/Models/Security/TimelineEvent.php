<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class TimelineEvent implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTime|null $eventDateTime The date and time when the event occurred.
    */
    private ?DateTime $eventDateTime = null;
    
    /**
     * @var string|null $eventDetails Additional details or context about the event.
    */
    private ?string $eventDetails = null;
    
    /**
     * @var string|null $eventResult The outcome or result of the event, such as delivery location or action taken.
    */
    private ?string $eventResult = null;
    
    /**
     * @var EventSource|null $eventSource The origin or actor that triggered the event. The possible values are: system, admin, user, unknownFutureValue.
    */
    private ?EventSource $eventSource = null;
    
    /**
     * @var array<string>|null $eventThreats Collection of threats identified or associated with this event.
    */
    private ?array $eventThreats = null;
    
    /**
     * @var TimelineEventType|null $eventType The type of event that occurred. The possible values are: originalDelivery, systemTimeTravel, dynamicDelivery, userUrlClick, reprocessed, zap, quarantineRelease, air, unknown, unknownFutureValue.
    */
    private ?TimelineEventType $eventType = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new TimelineEvent and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TimelineEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TimelineEvent {
        return new TimelineEvent();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the eventDateTime property value. The date and time when the event occurred.
     * @return DateTime|null
    */
    public function getEventDateTime(): ?DateTime {
        return $this->eventDateTime;
    }

    /**
     * Gets the eventDetails property value. Additional details or context about the event.
     * @return string|null
    */
    public function getEventDetails(): ?string {
        return $this->eventDetails;
    }

    /**
     * Gets the eventResult property value. The outcome or result of the event, such as delivery location or action taken.
     * @return string|null
    */
    public function getEventResult(): ?string {
        return $this->eventResult;
    }

    /**
     * Gets the eventSource property value. The origin or actor that triggered the event. The possible values are: system, admin, user, unknownFutureValue.
     * @return EventSource|null
    */
    public function getEventSource(): ?EventSource {
        return $this->eventSource;
    }

    /**
     * Gets the eventThreats property value. Collection of threats identified or associated with this event.
     * @return array<string>|null
    */
    public function getEventThreats(): ?array {
        return $this->eventThreats;
    }

    /**
     * Gets the eventType property value. The type of event that occurred. The possible values are: originalDelivery, systemTimeTravel, dynamicDelivery, userUrlClick, reprocessed, zap, quarantineRelease, air, unknown, unknownFutureValue.
     * @return TimelineEventType|null
    */
    public function getEventType(): ?TimelineEventType {
        return $this->eventType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'eventDateTime' => fn(ParseNode $n) => $o->setEventDateTime($n->getDateTimeValue()),
            'eventDetails' => fn(ParseNode $n) => $o->setEventDetails($n->getStringValue()),
            'eventResult' => fn(ParseNode $n) => $o->setEventResult($n->getStringValue()),
            'eventSource' => fn(ParseNode $n) => $o->setEventSource($n->getEnumValue(EventSource::class)),
            'eventThreats' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setEventThreats($val);
            },
            'eventType' => fn(ParseNode $n) => $o->setEventType($n->getEnumValue(TimelineEventType::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeDateTimeValue('eventDateTime', $this->getEventDateTime());
        $writer->writeStringValue('eventDetails', $this->getEventDetails());
        $writer->writeStringValue('eventResult', $this->getEventResult());
        $writer->writeEnumValue('eventSource', $this->getEventSource());
        $writer->writeCollectionOfPrimitiveValues('eventThreats', $this->getEventThreats());
        $writer->writeEnumValue('eventType', $this->getEventType());
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
     * Sets the eventDateTime property value. The date and time when the event occurred.
     * @param DateTime|null $value Value to set for the eventDateTime property.
    */
    public function setEventDateTime(?DateTime $value): void {
        $this->eventDateTime = $value;
    }

    /**
     * Sets the eventDetails property value. Additional details or context about the event.
     * @param string|null $value Value to set for the eventDetails property.
    */
    public function setEventDetails(?string $value): void {
        $this->eventDetails = $value;
    }

    /**
     * Sets the eventResult property value. The outcome or result of the event, such as delivery location or action taken.
     * @param string|null $value Value to set for the eventResult property.
    */
    public function setEventResult(?string $value): void {
        $this->eventResult = $value;
    }

    /**
     * Sets the eventSource property value. The origin or actor that triggered the event. The possible values are: system, admin, user, unknownFutureValue.
     * @param EventSource|null $value Value to set for the eventSource property.
    */
    public function setEventSource(?EventSource $value): void {
        $this->eventSource = $value;
    }

    /**
     * Sets the eventThreats property value. Collection of threats identified or associated with this event.
     * @param array<string>|null $value Value to set for the eventThreats property.
    */
    public function setEventThreats(?array $value): void {
        $this->eventThreats = $value;
    }

    /**
     * Sets the eventType property value. The type of event that occurred. The possible values are: originalDelivery, systemTimeTravel, dynamicDelivery, userUrlClick, reprocessed, zap, quarantineRelease, air, unknown, unknownFutureValue.
     * @param TimelineEventType|null $value Value to set for the eventType property.
    */
    public function setEventType(?TimelineEventType $value): void {
        $this->eventType = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
