<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VirtualEventRegistration extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $cancelationDateTime Date and time when the registrant cancels their registration for the virtual event. Only appears when applicable. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $cancelationDateTime = null;
    
    /**
     * @var string|null $email Email address of the registrant.
    */
    private ?string $email = null;
    
    /**
     * @var VirtualEventExternalRegistrationInformation|null $externalRegistrationInformation The external information for a virtual event registration.
    */
    private ?VirtualEventExternalRegistrationInformation $externalRegistrationInformation = null;
    
    /**
     * @var string|null $firstName First name of the registrant.
    */
    private ?string $firstName = null;
    
    /**
     * @var string|null $lastName Last name of the registrant.
    */
    private ?string $lastName = null;
    
    /**
     * @var string|null $preferredLanguage The registrant's preferred language.
    */
    private ?string $preferredLanguage = null;
    
    /**
     * @var string|null $preferredTimezone The registrant's time zone details.
    */
    private ?string $preferredTimezone = null;
    
    /**
     * @var DateTime|null $registrationDateTime Date and time when the registrant registers for the virtual event. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $registrationDateTime = null;
    
    /**
     * @var array<VirtualEventRegistrationQuestionAnswer>|null $registrationQuestionAnswers The registrant's answer to the registration questions.
    */
    private ?array $registrationQuestionAnswers = null;
    
    /**
     * @var array<VirtualEventSession>|null $sessions Sessions for a registration.
    */
    private ?array $sessions = null;
    
    /**
     * @var VirtualEventAttendeeRegistrationStatus|null $status Registration status of the registrant. Read-only. Possible values are registered, canceled, waitlisted, pendingApproval, rejectedByOrganizer, and unknownFutureValue.
    */
    private ?VirtualEventAttendeeRegistrationStatus $status = null;
    
    /**
     * @var string|null $userId The registrant's ID in Microsoft Entra ID. Only appears when the registrant is registered in Microsoft Entra ID.
    */
    private ?string $userId = null;
    
    /**
     * Instantiates a new VirtualEventRegistration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEventRegistration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEventRegistration {
        return new VirtualEventRegistration();
    }

    /**
     * Gets the cancelationDateTime property value. Date and time when the registrant cancels their registration for the virtual event. Only appears when applicable. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCancelationDateTime(): ?DateTime {
        return $this->cancelationDateTime;
    }

    /**
     * Gets the email property value. Email address of the registrant.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Gets the externalRegistrationInformation property value. The external information for a virtual event registration.
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
            'cancelationDateTime' => fn(ParseNode $n) => $o->setCancelationDateTime($n->getDateTimeValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'externalRegistrationInformation' => fn(ParseNode $n) => $o->setExternalRegistrationInformation($n->getObjectValue([VirtualEventExternalRegistrationInformation::class, 'createFromDiscriminatorValue'])),
            'firstName' => fn(ParseNode $n) => $o->setFirstName($n->getStringValue()),
            'lastName' => fn(ParseNode $n) => $o->setLastName($n->getStringValue()),
            'preferredLanguage' => fn(ParseNode $n) => $o->setPreferredLanguage($n->getStringValue()),
            'preferredTimezone' => fn(ParseNode $n) => $o->setPreferredTimezone($n->getStringValue()),
            'registrationDateTime' => fn(ParseNode $n) => $o->setRegistrationDateTime($n->getDateTimeValue()),
            'registrationQuestionAnswers' => fn(ParseNode $n) => $o->setRegistrationQuestionAnswers($n->getCollectionOfObjectValues([VirtualEventRegistrationQuestionAnswer::class, 'createFromDiscriminatorValue'])),
            'sessions' => fn(ParseNode $n) => $o->setSessions($n->getCollectionOfObjectValues([VirtualEventSession::class, 'createFromDiscriminatorValue'])),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(VirtualEventAttendeeRegistrationStatus::class)),
            'userId' => fn(ParseNode $n) => $o->setUserId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the firstName property value. First name of the registrant.
     * @return string|null
    */
    public function getFirstName(): ?string {
        return $this->firstName;
    }

    /**
     * Gets the lastName property value. Last name of the registrant.
     * @return string|null
    */
    public function getLastName(): ?string {
        return $this->lastName;
    }

    /**
     * Gets the preferredLanguage property value. The registrant's preferred language.
     * @return string|null
    */
    public function getPreferredLanguage(): ?string {
        return $this->preferredLanguage;
    }

    /**
     * Gets the preferredTimezone property value. The registrant's time zone details.
     * @return string|null
    */
    public function getPreferredTimezone(): ?string {
        return $this->preferredTimezone;
    }

    /**
     * Gets the registrationDateTime property value. Date and time when the registrant registers for the virtual event. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getRegistrationDateTime(): ?DateTime {
        return $this->registrationDateTime;
    }

    /**
     * Gets the registrationQuestionAnswers property value. The registrant's answer to the registration questions.
     * @return array<VirtualEventRegistrationQuestionAnswer>|null
    */
    public function getRegistrationQuestionAnswers(): ?array {
        return $this->registrationQuestionAnswers;
    }

    /**
     * Gets the sessions property value. Sessions for a registration.
     * @return array<VirtualEventSession>|null
    */
    public function getSessions(): ?array {
        return $this->sessions;
    }

    /**
     * Gets the status property value. Registration status of the registrant. Read-only. Possible values are registered, canceled, waitlisted, pendingApproval, rejectedByOrganizer, and unknownFutureValue.
     * @return VirtualEventAttendeeRegistrationStatus|null
    */
    public function getStatus(): ?VirtualEventAttendeeRegistrationStatus {
        return $this->status;
    }

    /**
     * Gets the userId property value. The registrant's ID in Microsoft Entra ID. Only appears when the registrant is registered in Microsoft Entra ID.
     * @return string|null
    */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('cancelationDateTime', $this->getCancelationDateTime());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeObjectValue('externalRegistrationInformation', $this->getExternalRegistrationInformation());
        $writer->writeStringValue('firstName', $this->getFirstName());
        $writer->writeStringValue('lastName', $this->getLastName());
        $writer->writeStringValue('preferredLanguage', $this->getPreferredLanguage());
        $writer->writeStringValue('preferredTimezone', $this->getPreferredTimezone());
        $writer->writeDateTimeValue('registrationDateTime', $this->getRegistrationDateTime());
        $writer->writeCollectionOfObjectValues('registrationQuestionAnswers', $this->getRegistrationQuestionAnswers());
        $writer->writeCollectionOfObjectValues('sessions', $this->getSessions());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeStringValue('userId', $this->getUserId());
    }

    /**
     * Sets the cancelationDateTime property value. Date and time when the registrant cancels their registration for the virtual event. Only appears when applicable. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the cancelationDateTime property.
    */
    public function setCancelationDateTime(?DateTime $value): void {
        $this->cancelationDateTime = $value;
    }

    /**
     * Sets the email property value. Email address of the registrant.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the externalRegistrationInformation property value. The external information for a virtual event registration.
     * @param VirtualEventExternalRegistrationInformation|null $value Value to set for the externalRegistrationInformation property.
    */
    public function setExternalRegistrationInformation(?VirtualEventExternalRegistrationInformation $value): void {
        $this->externalRegistrationInformation = $value;
    }

    /**
     * Sets the firstName property value. First name of the registrant.
     * @param string|null $value Value to set for the firstName property.
    */
    public function setFirstName(?string $value): void {
        $this->firstName = $value;
    }

    /**
     * Sets the lastName property value. Last name of the registrant.
     * @param string|null $value Value to set for the lastName property.
    */
    public function setLastName(?string $value): void {
        $this->lastName = $value;
    }

    /**
     * Sets the preferredLanguage property value. The registrant's preferred language.
     * @param string|null $value Value to set for the preferredLanguage property.
    */
    public function setPreferredLanguage(?string $value): void {
        $this->preferredLanguage = $value;
    }

    /**
     * Sets the preferredTimezone property value. The registrant's time zone details.
     * @param string|null $value Value to set for the preferredTimezone property.
    */
    public function setPreferredTimezone(?string $value): void {
        $this->preferredTimezone = $value;
    }

    /**
     * Sets the registrationDateTime property value. Date and time when the registrant registers for the virtual event. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the registrationDateTime property.
    */
    public function setRegistrationDateTime(?DateTime $value): void {
        $this->registrationDateTime = $value;
    }

    /**
     * Sets the registrationQuestionAnswers property value. The registrant's answer to the registration questions.
     * @param array<VirtualEventRegistrationQuestionAnswer>|null $value Value to set for the registrationQuestionAnswers property.
    */
    public function setRegistrationQuestionAnswers(?array $value): void {
        $this->registrationQuestionAnswers = $value;
    }

    /**
     * Sets the sessions property value. Sessions for a registration.
     * @param array<VirtualEventSession>|null $value Value to set for the sessions property.
    */
    public function setSessions(?array $value): void {
        $this->sessions = $value;
    }

    /**
     * Sets the status property value. Registration status of the registrant. Read-only. Possible values are registered, canceled, waitlisted, pendingApproval, rejectedByOrganizer, and unknownFutureValue.
     * @param VirtualEventAttendeeRegistrationStatus|null $value Value to set for the status property.
    */
    public function setStatus(?VirtualEventAttendeeRegistrationStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the userId property value. The registrant's ID in Microsoft Entra ID. Only appears when the registrant is registered in Microsoft Entra ID.
     * @param string|null $value Value to set for the userId property.
    */
    public function setUserId(?string $value): void {
        $this->userId = $value;
    }

}
