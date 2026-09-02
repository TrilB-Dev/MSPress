<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkHoursAndLocationsSetting extends Entity implements Parsable 
{
    /**
     * @var MaxWorkLocationDetails|null $maxSharedWorkLocationDetails The maxSharedWorkLocationDetails property
    */
    private ?MaxWorkLocationDetails $maxSharedWorkLocationDetails = null;
    
    /**
     * @var array<WorkPlanOccurrence>|null $occurrences Collection of work plan occurrences.
    */
    private ?array $occurrences = null;
    
    /**
     * @var array<WorkPlanRecurrence>|null $recurrences Collection of recurring work plans defined by the user.
    */
    private ?array $recurrences = null;
    
    /**
     * Instantiates a new WorkHoursAndLocationsSetting and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkHoursAndLocationsSetting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkHoursAndLocationsSetting {
        return new WorkHoursAndLocationsSetting();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'maxSharedWorkLocationDetails' => fn(ParseNode $n) => $o->setMaxSharedWorkLocationDetails($n->getEnumValue(MaxWorkLocationDetails::class)),
            'occurrences' => fn(ParseNode $n) => $o->setOccurrences($n->getCollectionOfObjectValues([WorkPlanOccurrence::class, 'createFromDiscriminatorValue'])),
            'recurrences' => fn(ParseNode $n) => $o->setRecurrences($n->getCollectionOfObjectValues([WorkPlanRecurrence::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the maxSharedWorkLocationDetails property value. The maxSharedWorkLocationDetails property
     * @return MaxWorkLocationDetails|null
    */
    public function getMaxSharedWorkLocationDetails(): ?MaxWorkLocationDetails {
        return $this->maxSharedWorkLocationDetails;
    }

    /**
     * Gets the occurrences property value. Collection of work plan occurrences.
     * @return array<WorkPlanOccurrence>|null
    */
    public function getOccurrences(): ?array {
        return $this->occurrences;
    }

    /**
     * Gets the recurrences property value. Collection of recurring work plans defined by the user.
     * @return array<WorkPlanRecurrence>|null
    */
    public function getRecurrences(): ?array {
        return $this->recurrences;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('maxSharedWorkLocationDetails', $this->getMaxSharedWorkLocationDetails());
        $writer->writeCollectionOfObjectValues('occurrences', $this->getOccurrences());
        $writer->writeCollectionOfObjectValues('recurrences', $this->getRecurrences());
    }

    /**
     * Sets the maxSharedWorkLocationDetails property value. The maxSharedWorkLocationDetails property
     * @param MaxWorkLocationDetails|null $value Value to set for the maxSharedWorkLocationDetails property.
    */
    public function setMaxSharedWorkLocationDetails(?MaxWorkLocationDetails $value): void {
        $this->maxSharedWorkLocationDetails = $value;
    }

    /**
     * Sets the occurrences property value. Collection of work plan occurrences.
     * @param array<WorkPlanOccurrence>|null $value Value to set for the occurrences property.
    */
    public function setOccurrences(?array $value): void {
        $this->occurrences = $value;
    }

    /**
     * Sets the recurrences property value. Collection of recurring work plans defined by the user.
     * @param array<WorkPlanRecurrence>|null $value Value to set for the recurrences property.
    */
    public function setRecurrences(?array $value): void {
        $this->recurrences = $value;
    }

}
