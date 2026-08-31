<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AttendanceRecord extends Entity implements Parsable 
{
    /**
     * @var array<AttendanceInterval>|null $attendanceIntervals List of time periods between joining and leaving a meeting.
    */
    private ?array $attendanceIntervals = null;
    
    /**
     * @var string|null $emailAddress Email address of the user associated with this attendance record.
    */
    private ?string $emailAddress = null;
    
    /**
     * @var VirtualEventExternalRegistrationInformation|null $externalRegistrationInformation The external information for a virtualEventRegistration.
    */
    private ?VirtualEventExternalRegistrationInformation $externalRegistrationInformation = null;
    
    /**
     * @var Identity|null $identity The identity of the user associated with this attendance record. The specific type is one of the following derived types of identity, depending on the user type: communicationsUserIdentity, azureCommunicationServicesUserIdentity.
    */
    private ?Identity $identity = null;
    
    /**
     * @var string|null $registrationId Unique identifier of a virtualEventRegistration that is available to all participants registered for the virtualEventWebinar.
    */
    private ?string $registrationId = null;
    
    /**
     * @var string|null $role Role of the attendee. The possible values are: None, Attendee, Presenter, and Organizer.
    */
    private ?string $role = null;
    
    /**
     * @var int|null $totalAttendanceInSeconds Total duration of the attendances in seconds.
    */
    private ?int $totalAttendanceInSeconds = null;
    
    /**
     * Instantiates a new AttendanceRecord and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AttendanceRecord
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AttendanceRecord {
        return new AttendanceRecord();
    }

    /**
     * Gets the attendanceIntervals property value. List of time periods between joining and leaving a meeting.
     * @return array<AttendanceInterval>|null
    */
    public function getAttendanceIntervals(): ?array {
        return $this->attendanceIntervals;
    }

    /**
     * Gets the emailAddress property value. Email address of the user associated with this attendance record.
     * @return string|null
    */
    public function getEmailAddress(): ?string {
        return $this->emailAddress;
    }

    /**
     * Gets the externalRegistrationInformation property value. The external information for a virtualEventRegistration.
     * @return VirtualEventExternalRegistrationInformation|null
    */
    public function getExternalRegistrationInformation(): ?VirtualEventExternalRegistrationInformation {
        return $this->externalRegistrationInformation;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'attendanceIntervals' => fn(ParseNode $n) => $o->setAttendanceIntervals($n->getCollectionOfObjectValues([AttendanceInterval::class, 'createFromDiscriminatorValue'])),
            'emailAddress' => fn(ParseNode $n) => $o->setEmailAddress($n->getStringValue()),
            'externalRegistrationInformation' => fn(ParseNode $n) => $o->setExternalRegistrationInformation($n->getObjectValue([VirtualEventExternalRegistrationInformation::class, 'createFromDiscriminatorValue'])),
            'identity' => fn(ParseNode $n) => $o->setIdentity($n->getObjectValue([Identity::class, 'createFromDiscriminatorValue'])),
            'registrationId' => fn(ParseNode $n) => $o->setRegistrationId($n->getStringValue()),
            'role' => fn(ParseNode $n) => $o->setRole($n->getStringValue()),
            'totalAttendanceInSeconds' => fn(ParseNode $n) => $o->setTotalAttendanceInSeconds($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the identity property value. The identity of the user associated with this attendance record. The specific type is one of the following derived types of identity, depending on the user type: communicationsUserIdentity, azureCommunicationServicesUserIdentity.
     * @return Identity|null
    */
    public function getIdentity(): ?Identity {
        return $this->identity;
    }

    /**
     * Gets the registrationId property value. Unique identifier of a virtualEventRegistration that is available to all participants registered for the virtualEventWebinar.
     * @return string|null
    */
    public function getRegistrationId(): ?string {
        return $this->registrationId;
    }

    /**
     * Gets the role property value. Role of the attendee. The possible values are: None, Attendee, Presenter, and Organizer.
     * @return string|null
    */
    public function getRole(): ?string {
        return $this->role;
    }

    /**
     * Gets the totalAttendanceInSeconds property value. Total duration of the attendances in seconds.
     * @return int|null
    */
    public function getTotalAttendanceInSeconds(): ?int {
        return $this->totalAttendanceInSeconds;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('attendanceIntervals', $this->getAttendanceIntervals());
        $writer->writeStringValue('emailAddress', $this->getEmailAddress());
        $writer->writeObjectValue('externalRegistrationInformation', $this->getExternalRegistrationInformation());
        $writer->writeObjectValue('identity', $this->getIdentity());
        $writer->writeStringValue('registrationId', $this->getRegistrationId());
        $writer->writeStringValue('role', $this->getRole());
        $writer->writeIntegerValue('totalAttendanceInSeconds', $this->getTotalAttendanceInSeconds());
    }

    /**
     * Sets the attendanceIntervals property value. List of time periods between joining and leaving a meeting.
     * @param array<AttendanceInterval>|null $value Value to set for the attendanceIntervals property.
    */
    public function setAttendanceIntervals(?array $value): void {
        $this->attendanceIntervals = $value;
    }

    /**
     * Sets the emailAddress property value. Email address of the user associated with this attendance record.
     * @param string|null $value Value to set for the emailAddress property.
    */
    public function setEmailAddress(?string $value): void {
        $this->emailAddress = $value;
    }

    /**
     * Sets the externalRegistrationInformation property value. The external information for a virtualEventRegistration.
     * @param VirtualEventExternalRegistrationInformation|null $value Value to set for the externalRegistrationInformation property.
    */
    public function setExternalRegistrationInformation(?VirtualEventExternalRegistrationInformation $value): void {
        $this->externalRegistrationInformation = $value;
    }

    /**
     * Sets the identity property value. The identity of the user associated with this attendance record. The specific type is one of the following derived types of identity, depending on the user type: communicationsUserIdentity, azureCommunicationServicesUserIdentity.
     * @param Identity|null $value Value to set for the identity property.
    */
    public function setIdentity(?Identity $value): void {
        $this->identity = $value;
    }

    /**
     * Sets the registrationId property value. Unique identifier of a virtualEventRegistration that is available to all participants registered for the virtualEventWebinar.
     * @param string|null $value Value to set for the registrationId property.
    */
    public function setRegistrationId(?string $value): void {
        $this->registrationId = $value;
    }

    /**
     * Sets the role property value. Role of the attendee. The possible values are: None, Attendee, Presenter, and Organizer.
     * @param string|null $value Value to set for the role property.
    */
    public function setRole(?string $value): void {
        $this->role = $value;
    }

    /**
     * Sets the totalAttendanceInSeconds property value. Total duration of the attendances in seconds.
     * @param int|null $value Value to set for the totalAttendanceInSeconds property.
    */
    public function setTotalAttendanceInSeconds(?int $value): void {
        $this->totalAttendanceInSeconds = $value;
    }

}
