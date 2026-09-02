<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Presence extends Entity implements Parsable 
{
    /**
     * @var string|null $activity The supplemental information to a user's availability. Possible values are available, away, beRightBack, busy, doNotDisturb, offline, outOfOffice, presenceUnknown.
    */
    private ?string $activity = null;
    
    /**
     * @var string|null $availability The base presence information for a user. Possible values are available, away, beRightBack, busy, doNotDisturb, focusing, inACall, inAMeeting, offline, presenting, presenceUnknown.
    */
    private ?string $availability = null;
    
    /**
     * @var OutOfOfficeSettings|null $outOfOfficeSettings The out of office settings for a user.
    */
    private ?OutOfOfficeSettings $outOfOfficeSettings = null;
    
    /**
     * @var string|null $sequenceNumber The lexicographically sortable String stamp that represents the version of a presence object.
    */
    private ?string $sequenceNumber = null;
    
    /**
     * @var PresenceStatusMessage|null $statusMessage The presence status message of a user.
    */
    private ?PresenceStatusMessage $statusMessage = null;
    
    /**
     * @var UserWorkLocation|null $workLocation Represents the user’s aggregated work location state.
    */
    private ?UserWorkLocation $workLocation = null;
    
    /**
     * Instantiates a new Presence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Presence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Presence {
        return new Presence();
    }

    /**
     * Gets the activity property value. The supplemental information to a user's availability. Possible values are available, away, beRightBack, busy, doNotDisturb, offline, outOfOffice, presenceUnknown.
     * @return string|null
    */
    public function getActivity(): ?string {
        return $this->activity;
    }

    /**
     * Gets the availability property value. The base presence information for a user. Possible values are available, away, beRightBack, busy, doNotDisturb, focusing, inACall, inAMeeting, offline, presenting, presenceUnknown.
     * @return string|null
    */
    public function getAvailability(): ?string {
        return $this->availability;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activity' => fn(ParseNode $n) => $o->setActivity($n->getStringValue()),
            'availability' => fn(ParseNode $n) => $o->setAvailability($n->getStringValue()),
            'outOfOfficeSettings' => fn(ParseNode $n) => $o->setOutOfOfficeSettings($n->getObjectValue([OutOfOfficeSettings::class, 'createFromDiscriminatorValue'])),
            'sequenceNumber' => fn(ParseNode $n) => $o->setSequenceNumber($n->getStringValue()),
            'statusMessage' => fn(ParseNode $n) => $o->setStatusMessage($n->getObjectValue([PresenceStatusMessage::class, 'createFromDiscriminatorValue'])),
            'workLocation' => fn(ParseNode $n) => $o->setWorkLocation($n->getObjectValue([UserWorkLocation::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the outOfOfficeSettings property value. The out of office settings for a user.
     * @return OutOfOfficeSettings|null
    */
    public function getOutOfOfficeSettings(): ?OutOfOfficeSettings {
        return $this->outOfOfficeSettings;
    }

    /**
     * Gets the sequenceNumber property value. The lexicographically sortable String stamp that represents the version of a presence object.
     * @return string|null
    */
    public function getSequenceNumber(): ?string {
        return $this->sequenceNumber;
    }

    /**
     * Gets the statusMessage property value. The presence status message of a user.
     * @return PresenceStatusMessage|null
    */
    public function getStatusMessage(): ?PresenceStatusMessage {
        return $this->statusMessage;
    }

    /**
     * Gets the workLocation property value. Represents the user’s aggregated work location state.
     * @return UserWorkLocation|null
    */
    public function getWorkLocation(): ?UserWorkLocation {
        return $this->workLocation;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('activity', $this->getActivity());
        $writer->writeStringValue('availability', $this->getAvailability());
        $writer->writeObjectValue('outOfOfficeSettings', $this->getOutOfOfficeSettings());
        $writer->writeObjectValue('statusMessage', $this->getStatusMessage());
        $writer->writeObjectValue('workLocation', $this->getWorkLocation());
    }

    /**
     * Sets the activity property value. The supplemental information to a user's availability. Possible values are available, away, beRightBack, busy, doNotDisturb, offline, outOfOffice, presenceUnknown.
     * @param string|null $value Value to set for the activity property.
    */
    public function setActivity(?string $value): void {
        $this->activity = $value;
    }

    /**
     * Sets the availability property value. The base presence information for a user. Possible values are available, away, beRightBack, busy, doNotDisturb, focusing, inACall, inAMeeting, offline, presenting, presenceUnknown.
     * @param string|null $value Value to set for the availability property.
    */
    public function setAvailability(?string $value): void {
        $this->availability = $value;
    }

    /**
     * Sets the outOfOfficeSettings property value. The out of office settings for a user.
     * @param OutOfOfficeSettings|null $value Value to set for the outOfOfficeSettings property.
    */
    public function setOutOfOfficeSettings(?OutOfOfficeSettings $value): void {
        $this->outOfOfficeSettings = $value;
    }

    /**
     * Sets the sequenceNumber property value. The lexicographically sortable String stamp that represents the version of a presence object.
     * @param string|null $value Value to set for the sequenceNumber property.
    */
    public function setSequenceNumber(?string $value): void {
        $this->sequenceNumber = $value;
    }

    /**
     * Sets the statusMessage property value. The presence status message of a user.
     * @param PresenceStatusMessage|null $value Value to set for the statusMessage property.
    */
    public function setStatusMessage(?PresenceStatusMessage $value): void {
        $this->statusMessage = $value;
    }

    /**
     * Sets the workLocation property value. Represents the user’s aggregated work location state.
     * @param UserWorkLocation|null $value Value to set for the workLocation property.
    */
    public function setWorkLocation(?UserWorkLocation $value): void {
        $this->workLocation = $value;
    }

}
