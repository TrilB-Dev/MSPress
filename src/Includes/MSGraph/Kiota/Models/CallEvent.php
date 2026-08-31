<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CallEvent extends Entity implements Parsable 
{
    /**
     * @var CallEventType|null $callEventType The callEventType property
    */
    private ?CallEventType $callEventType = null;
    
    /**
     * @var DateTime|null $eventDateTime The date and time when the event occurred. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $eventDateTime = null;
    
    /**
     * @var array<Participant>|null $participants Participants collection for the call event.
    */
    private ?array $participants = null;
    
    /**
     * Instantiates a new CallEvent and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CallEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CallEvent {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.emergencyCallEvent': return new EmergencyCallEvent();
            }
        }
        return new CallEvent();
    }

    /**
     * Gets the callEventType property value. The callEventType property
     * @return CallEventType|null
    */
    public function getCallEventType(): ?CallEventType {
        return $this->callEventType;
    }

    /**
     * Gets the eventDateTime property value. The date and time when the event occurred. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
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
        return array_merge(parent::getFieldDeserializers(), [
            'callEventType' => fn(ParseNode $n) => $o->setCallEventType($n->getEnumValue(CallEventType::class)),
            'eventDateTime' => fn(ParseNode $n) => $o->setEventDateTime($n->getDateTimeValue()),
            'participants' => fn(ParseNode $n) => $o->setParticipants($n->getCollectionOfObjectValues([Participant::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the participants property value. Participants collection for the call event.
     * @return array<Participant>|null
    */
    public function getParticipants(): ?array {
        return $this->participants;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('callEventType', $this->getCallEventType());
        $writer->writeDateTimeValue('eventDateTime', $this->getEventDateTime());
        $writer->writeCollectionOfObjectValues('participants', $this->getParticipants());
    }

    /**
     * Sets the callEventType property value. The callEventType property
     * @param CallEventType|null $value Value to set for the callEventType property.
    */
    public function setCallEventType(?CallEventType $value): void {
        $this->callEventType = $value;
    }

    /**
     * Sets the eventDateTime property value. The date and time when the event occurred. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the eventDateTime property.
    */
    public function setEventDateTime(?DateTime $value): void {
        $this->eventDateTime = $value;
    }

    /**
     * Sets the participants property value. Participants collection for the call event.
     * @param array<Participant>|null $value Value to set for the participants property.
    */
    public function setParticipants(?array $value): void {
        $this->participants = $value;
    }

}
