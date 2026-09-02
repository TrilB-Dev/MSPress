<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PrivilegedAccessScheduleInstance extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $endDateTime When the schedule instance ends. Required.
    */
    private ?DateTime $endDateTime = null;
    
    /**
     * @var DateTime|null $startDateTime When this instance starts. Required.
    */
    private ?DateTime $startDateTime = null;
    
    /**
     * Instantiates a new PrivilegedAccessScheduleInstance and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PrivilegedAccessScheduleInstance
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PrivilegedAccessScheduleInstance {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.privilegedAccessGroupAssignmentScheduleInstance': return new PrivilegedAccessGroupAssignmentScheduleInstance();
                case '#microsoft.graph.privilegedAccessGroupEligibilityScheduleInstance': return new PrivilegedAccessGroupEligibilityScheduleInstance();
            }
        }
        return new PrivilegedAccessScheduleInstance();
    }

    /**
     * Gets the endDateTime property value. When the schedule instance ends. Required.
     * @return DateTime|null
    */
    public function getEndDateTime(): ?DateTime {
        return $this->endDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'endDateTime' => fn(ParseNode $n) => $o->setEndDateTime($n->getDateTimeValue()),
            'startDateTime' => fn(ParseNode $n) => $o->setStartDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the startDateTime property value. When this instance starts. Required.
     * @return DateTime|null
    */
    public function getStartDateTime(): ?DateTime {
        return $this->startDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('endDateTime', $this->getEndDateTime());
        $writer->writeDateTimeValue('startDateTime', $this->getStartDateTime());
    }

    /**
     * Sets the endDateTime property value. When the schedule instance ends. Required.
     * @param DateTime|null $value Value to set for the endDateTime property.
    */
    public function setEndDateTime(?DateTime $value): void {
        $this->endDateTime = $value;
    }

    /**
     * Sets the startDateTime property value. When this instance starts. Required.
     * @param DateTime|null $value Value to set for the startDateTime property.
    */
    public function setStartDateTime(?DateTime $value): void {
        $this->startDateTime = $value;
    }

}
