<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VirtualEventRegistrationConfiguration extends Entity implements Parsable 
{
    /**
     * @var int|null $capacity Total capacity of the virtual event.
    */
    private ?int $capacity = null;
    
    /**
     * @var bool|null $isManualApprovalEnabled Indicates whether registrations require organizer approval before a participant is confirmed.
    */
    private ?bool $isManualApprovalEnabled = null;
    
    /**
     * @var bool|null $isWaitlistEnabled Indicates whether more registrants are automatically placed on a waitlist when capacity is reached.
    */
    private ?bool $isWaitlistEnabled = null;
    
    /**
     * @var array<VirtualEventRegistrationQuestionBase>|null $questions Registration questions.
    */
    private ?array $questions = null;
    
    /**
     * @var string|null $registrationWebUrl Registration URL of the virtual event.
    */
    private ?string $registrationWebUrl = null;
    
    /**
     * Instantiates a new VirtualEventRegistrationConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEventRegistrationConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEventRegistrationConfiguration {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.virtualEventTownhallRegistrationConfiguration': return new VirtualEventTownhallRegistrationConfiguration();
                case '#microsoft.graph.virtualEventWebinarRegistrationConfiguration': return new VirtualEventWebinarRegistrationConfiguration();
            }
        }
        return new VirtualEventRegistrationConfiguration();
    }

    /**
     * Gets the capacity property value. Total capacity of the virtual event.
     * @return int|null
    */
    public function getCapacity(): ?int {
        return $this->capacity;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'capacity' => fn(ParseNode $n) => $o->setCapacity($n->getIntegerValue()),
            'isManualApprovalEnabled' => fn(ParseNode $n) => $o->setIsManualApprovalEnabled($n->getBooleanValue()),
            'isWaitlistEnabled' => fn(ParseNode $n) => $o->setIsWaitlistEnabled($n->getBooleanValue()),
            'questions' => fn(ParseNode $n) => $o->setQuestions($n->getCollectionOfObjectValues([VirtualEventRegistrationQuestionBase::class, 'createFromDiscriminatorValue'])),
            'registrationWebUrl' => fn(ParseNode $n) => $o->setRegistrationWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isManualApprovalEnabled property value. Indicates whether registrations require organizer approval before a participant is confirmed.
     * @return bool|null
    */
    public function getIsManualApprovalEnabled(): ?bool {
        return $this->isManualApprovalEnabled;
    }

    /**
     * Gets the isWaitlistEnabled property value. Indicates whether more registrants are automatically placed on a waitlist when capacity is reached.
     * @return bool|null
    */
    public function getIsWaitlistEnabled(): ?bool {
        return $this->isWaitlistEnabled;
    }

    /**
     * Gets the questions property value. Registration questions.
     * @return array<VirtualEventRegistrationQuestionBase>|null
    */
    public function getQuestions(): ?array {
        return $this->questions;
    }

    /**
     * Gets the registrationWebUrl property value. Registration URL of the virtual event.
     * @return string|null
    */
    public function getRegistrationWebUrl(): ?string {
        return $this->registrationWebUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('capacity', $this->getCapacity());
        $writer->writeBooleanValue('isManualApprovalEnabled', $this->getIsManualApprovalEnabled());
        $writer->writeBooleanValue('isWaitlistEnabled', $this->getIsWaitlistEnabled());
        $writer->writeCollectionOfObjectValues('questions', $this->getQuestions());
        $writer->writeStringValue('registrationWebUrl', $this->getRegistrationWebUrl());
    }

    /**
     * Sets the capacity property value. Total capacity of the virtual event.
     * @param int|null $value Value to set for the capacity property.
    */
    public function setCapacity(?int $value): void {
        $this->capacity = $value;
    }

    /**
     * Sets the isManualApprovalEnabled property value. Indicates whether registrations require organizer approval before a participant is confirmed.
     * @param bool|null $value Value to set for the isManualApprovalEnabled property.
    */
    public function setIsManualApprovalEnabled(?bool $value): void {
        $this->isManualApprovalEnabled = $value;
    }

    /**
     * Sets the isWaitlistEnabled property value. Indicates whether more registrants are automatically placed on a waitlist when capacity is reached.
     * @param bool|null $value Value to set for the isWaitlistEnabled property.
    */
    public function setIsWaitlistEnabled(?bool $value): void {
        $this->isWaitlistEnabled = $value;
    }

    /**
     * Sets the questions property value. Registration questions.
     * @param array<VirtualEventRegistrationQuestionBase>|null $value Value to set for the questions property.
    */
    public function setQuestions(?array $value): void {
        $this->questions = $value;
    }

    /**
     * Sets the registrationWebUrl property value. Registration URL of the virtual event.
     * @param string|null $value Value to set for the registrationWebUrl property.
    */
    public function setRegistrationWebUrl(?string $value): void {
        $this->registrationWebUrl = $value;
    }

}
