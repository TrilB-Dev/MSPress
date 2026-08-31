<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\Date;

class DayNote extends ChangeTrackedEntity implements Parsable 
{
    /**
     * @var Date|null $dayNoteDate The date of the day note.
    */
    private ?Date $dayNoteDate = null;
    
    /**
     * @var ItemBody|null $draftDayNote The draft version of this day note that is viewable by managers. Only contentType text is supported.
    */
    private ?ItemBody $draftDayNote = null;
    
    /**
     * @var ItemBody|null $sharedDayNote The shared version of this day note that is viewable by both employees and managers. Only contentType text is supported.
    */
    private ?ItemBody $sharedDayNote = null;
    
    /**
     * Instantiates a new DayNote and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.dayNote');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DayNote
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DayNote {
        return new DayNote();
    }

    /**
     * Gets the dayNoteDate property value. The date of the day note.
     * @return Date|null
    */
    public function getDayNoteDate(): ?Date {
        return $this->dayNoteDate;
    }

    /**
     * Gets the draftDayNote property value. The draft version of this day note that is viewable by managers. Only contentType text is supported.
     * @return ItemBody|null
    */
    public function getDraftDayNote(): ?ItemBody {
        return $this->draftDayNote;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'dayNoteDate' => fn(ParseNode $n) => $o->setDayNoteDate($n->getDateValue()),
            'draftDayNote' => fn(ParseNode $n) => $o->setDraftDayNote($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
            'sharedDayNote' => fn(ParseNode $n) => $o->setSharedDayNote($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the sharedDayNote property value. The shared version of this day note that is viewable by both employees and managers. Only contentType text is supported.
     * @return ItemBody|null
    */
    public function getSharedDayNote(): ?ItemBody {
        return $this->sharedDayNote;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateValue('dayNoteDate', $this->getDayNoteDate());
        $writer->writeObjectValue('draftDayNote', $this->getDraftDayNote());
        $writer->writeObjectValue('sharedDayNote', $this->getSharedDayNote());
    }

    /**
     * Sets the dayNoteDate property value. The date of the day note.
     * @param Date|null $value Value to set for the dayNoteDate property.
    */
    public function setDayNoteDate(?Date $value): void {
        $this->dayNoteDate = $value;
    }

    /**
     * Sets the draftDayNote property value. The draft version of this day note that is viewable by managers. Only contentType text is supported.
     * @param ItemBody|null $value Value to set for the draftDayNote property.
    */
    public function setDraftDayNote(?ItemBody $value): void {
        $this->draftDayNote = $value;
    }

    /**
     * Sets the sharedDayNote property value. The shared version of this day note that is viewable by both employees and managers. Only contentType text is supported.
     * @param ItemBody|null $value Value to set for the sharedDayNote property.
    */
    public function setSharedDayNote(?ItemBody $value): void {
        $this->sharedDayNote = $value;
    }

}
