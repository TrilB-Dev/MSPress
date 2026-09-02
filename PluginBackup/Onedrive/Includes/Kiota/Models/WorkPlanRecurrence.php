<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkPlanRecurrence extends Entity implements Parsable 
{
    /**
     * @var DateTimeTimeZone|null $end The end property
    */
    private ?DateTimeTimeZone $end = null;
    
    /**
     * @var string|null $placeId Identifier of a place from the Microsoft Graph Places Directory API. Only applicable when workLocationType is set to office.
    */
    private ?string $placeId = null;
    
    /**
     * @var PatternedRecurrence|null $recurrence The recurrence property
    */
    private ?PatternedRecurrence $recurrence = null;
    
    /**
     * @var DateTimeTimeZone|null $start The start property
    */
    private ?DateTimeTimeZone $start = null;
    
    /**
     * @var WorkLocationType|null $workLocationType The workLocationType property
    */
    private ?WorkLocationType $workLocationType = null;
    
    /**
     * Instantiates a new WorkPlanRecurrence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkPlanRecurrence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkPlanRecurrence {
        return new WorkPlanRecurrence();
    }

    /**
     * Gets the end property value. The end property
     * @return DateTimeTimeZone|null
    */
    public function getEnd(): ?DateTimeTimeZone {
        return $this->end;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'end' => fn(ParseNode $n) => $o->setEnd($n->getObjectValue([DateTimeTimeZone::class, 'createFromDiscriminatorValue'])),
            'placeId' => fn(ParseNode $n) => $o->setPlaceId($n->getStringValue()),
            'recurrence' => fn(ParseNode $n) => $o->setRecurrence($n->getObjectValue([PatternedRecurrence::class, 'createFromDiscriminatorValue'])),
            'start' => fn(ParseNode $n) => $o->setStart($n->getObjectValue([DateTimeTimeZone::class, 'createFromDiscriminatorValue'])),
            'workLocationType' => fn(ParseNode $n) => $o->setWorkLocationType($n->getEnumValue(WorkLocationType::class)),
        ]);
    }

    /**
     * Gets the placeId property value. Identifier of a place from the Microsoft Graph Places Directory API. Only applicable when workLocationType is set to office.
     * @return string|null
    */
    public function getPlaceId(): ?string {
        return $this->placeId;
    }

    /**
     * Gets the recurrence property value. The recurrence property
     * @return PatternedRecurrence|null
    */
    public function getRecurrence(): ?PatternedRecurrence {
        return $this->recurrence;
    }

    /**
     * Gets the start property value. The start property
     * @return DateTimeTimeZone|null
    */
    public function getStart(): ?DateTimeTimeZone {
        return $this->start;
    }

    /**
     * Gets the workLocationType property value. The workLocationType property
     * @return WorkLocationType|null
    */
    public function getWorkLocationType(): ?WorkLocationType {
        return $this->workLocationType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('end', $this->getEnd());
        $writer->writeStringValue('placeId', $this->getPlaceId());
        $writer->writeObjectValue('recurrence', $this->getRecurrence());
        $writer->writeObjectValue('start', $this->getStart());
        $writer->writeEnumValue('workLocationType', $this->getWorkLocationType());
    }

    /**
     * Sets the end property value. The end property
     * @param DateTimeTimeZone|null $value Value to set for the end property.
    */
    public function setEnd(?DateTimeTimeZone $value): void {
        $this->end = $value;
    }

    /**
     * Sets the placeId property value. Identifier of a place from the Microsoft Graph Places Directory API. Only applicable when workLocationType is set to office.
     * @param string|null $value Value to set for the placeId property.
    */
    public function setPlaceId(?string $value): void {
        $this->placeId = $value;
    }

    /**
     * Sets the recurrence property value. The recurrence property
     * @param PatternedRecurrence|null $value Value to set for the recurrence property.
    */
    public function setRecurrence(?PatternedRecurrence $value): void {
        $this->recurrence = $value;
    }

    /**
     * Sets the start property value. The start property
     * @param DateTimeTimeZone|null $value Value to set for the start property.
    */
    public function setStart(?DateTimeTimeZone $value): void {
        $this->start = $value;
    }

    /**
     * Sets the workLocationType property value. The workLocationType property
     * @param WorkLocationType|null $value Value to set for the workLocationType property.
    */
    public function setWorkLocationType(?WorkLocationType $value): void {
        $this->workLocationType = $value;
    }

}
