<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EventMessageResponse extends EventMessage implements Parsable 
{
    /**
     * @var TimeSlot|null $proposedNewTime An alternate date/time proposed by an invitee for a meeting request to start and end. Read-only. Not filterable.
    */
    private ?TimeSlot $proposedNewTime = null;
    
    /**
     * @var ResponseType|null $responseType Specifies the type of response to a meeting request. The possible values are: tentativelyAccepted, accepted, declined. For the eventMessageResponse type, none, organizer, and notResponded are not supported. Read-only. Not filterable.
    */
    private ?ResponseType $responseType = null;
    
    /**
     * Instantiates a new EventMessageResponse and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.eventMessageResponse');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EventMessageResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EventMessageResponse {
        return new EventMessageResponse();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'proposedNewTime' => fn(ParseNode $n) => $o->setProposedNewTime($n->getObjectValue([TimeSlot::class, 'createFromDiscriminatorValue'])),
            'responseType' => fn(ParseNode $n) => $o->setResponseType($n->getEnumValue(ResponseType::class)),
        ]);
    }

    /**
     * Gets the proposedNewTime property value. An alternate date/time proposed by an invitee for a meeting request to start and end. Read-only. Not filterable.
     * @return TimeSlot|null
    */
    public function getProposedNewTime(): ?TimeSlot {
        return $this->proposedNewTime;
    }

    /**
     * Gets the responseType property value. Specifies the type of response to a meeting request. The possible values are: tentativelyAccepted, accepted, declined. For the eventMessageResponse type, none, organizer, and notResponded are not supported. Read-only. Not filterable.
     * @return ResponseType|null
    */
    public function getResponseType(): ?ResponseType {
        return $this->responseType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('proposedNewTime', $this->getProposedNewTime());
        $writer->writeEnumValue('responseType', $this->getResponseType());
    }

    /**
     * Sets the proposedNewTime property value. An alternate date/time proposed by an invitee for a meeting request to start and end. Read-only. Not filterable.
     * @param TimeSlot|null $value Value to set for the proposedNewTime property.
    */
    public function setProposedNewTime(?TimeSlot $value): void {
        $this->proposedNewTime = $value;
    }

    /**
     * Sets the responseType property value. Specifies the type of response to a meeting request. The possible values are: tentativelyAccepted, accepted, declined. For the eventMessageResponse type, none, organizer, and notResponded are not supported. Read-only. Not filterable.
     * @param ResponseType|null $value Value to set for the responseType property.
    */
    public function setResponseType(?ResponseType $value): void {
        $this->responseType = $value;
    }

}
