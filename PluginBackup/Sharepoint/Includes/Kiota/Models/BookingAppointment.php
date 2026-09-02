<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateInterval;
use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * Represents a booked appointment of a service by a customer in a business.
*/
class BookingAppointment extends Entity implements Parsable 
{
    /**
     * @var string|null $additionalInformation Additional information that is sent to the customer when an appointment is confirmed.
    */
    private ?string $additionalInformation = null;
    
    /**
     * @var string|null $anonymousJoinWebUrl The URL of the meeting to join anonymously.
    */
    private ?string $anonymousJoinWebUrl = null;
    
    /**
     * @var string|null $appointmentLabel The custom label that can be stamped on this appointment by users.
    */
    private ?string $appointmentLabel = null;
    
    /**
     * @var DateTime|null $createdDateTime The date, time, and time zone when the appointment was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $customerEmailAddress The SMTP address of the bookingCustomer who books the appointment.
    */
    private ?string $customerEmailAddress = null;
    
    /**
     * @var string|null $customerName The customer's name.
    */
    private ?string $customerName = null;
    
    /**
     * @var string|null $customerNotes Notes from the customer associated with this appointment. You can get the value only when you read this bookingAppointment by its ID. You can set this property only when you initially create an appointment with a new customer.
    */
    private ?string $customerNotes = null;
    
    /**
     * @var string|null $customerPhone The customer's phone number.
    */
    private ?string $customerPhone = null;
    
    /**
     * @var array<BookingCustomerInformationBase>|null $customers A collection of customer properties for an appointment. An appointment contains a list of customer information and each unit will indicate the properties of a customer who is part of that appointment. Optional.
    */
    private ?array $customers = null;
    
    /**
     * @var string|null $customerTimeZone The time zone of the customer. For a list of possible values, see dateTimeTimeZone.
    */
    private ?string $customerTimeZone = null;
    
    /**
     * @var DateInterval|null $duration The length of the appointment, denoted in ISO8601 format.
    */
    private ?DateInterval $duration = null;
    
    /**
     * @var DateTimeTimeZone|null $endDateTime The endDateTime property
    */
    private ?DateTimeTimeZone $endDateTime = null;
    
    /**
     * @var int|null $filledAttendeesCount The current number of customers in the appointment.
    */
    private ?int $filledAttendeesCount = null;
    
    /**
     * @var bool|null $isCustomerAllowedToManageBooking Indicates that the customer can manage bookings created by the staff. The default value is false.
    */
    private ?bool $isCustomerAllowedToManageBooking = null;
    
    /**
     * @var bool|null $isLocationOnline Indicates that the appointment is held online. The default value is false.
    */
    private ?bool $isLocationOnline = null;
    
    /**
     * @var string|null $joinWebUrl The URL of the online meeting for the appointment.
    */
    private ?string $joinWebUrl = null;
    
    /**
     * @var DateTime|null $lastUpdatedDateTime The date, time, and time zone when the booking business was last updated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastUpdatedDateTime = null;
    
    /**
     * @var int|null $maximumAttendeesCount The maximum number of customers allowed in an appointment. If maximumAttendeesCount of the service is greater than 1, pass valid customer IDs while creating or updating an appointment. To create a customer, use the Create bookingCustomer operation.
    */
    private ?int $maximumAttendeesCount = null;
    
    /**
     * @var bool|null $optOutOfCustomerEmail If true indicates that the bookingCustomer for this appointment doesn't wish to receive a confirmation for this appointment.
    */
    private ?bool $optOutOfCustomerEmail = null;
    
    /**
     * @var DateInterval|null $postBuffer The amount of time to reserve after the appointment ends, for cleaning up, as an example. The value is expressed in ISO8601 format.
    */
    private ?DateInterval $postBuffer = null;
    
    /**
     * @var DateInterval|null $preBuffer The amount of time to reserve before the appointment begins, for preparation, as an example. The value is expressed in ISO8601 format.
    */
    private ?DateInterval $preBuffer = null;
    
    /**
     * @var float|null $price The regular price for an appointment for the specified bookingService.
    */
    private ?float $price = null;
    
    /**
     * @var BookingPriceType|null $priceType Represents the type of pricing of a booking service.
    */
    private ?BookingPriceType $priceType = null;
    
    /**
     * @var array<BookingReminder>|null $reminders The collection of customer reminders sent for this appointment. The value of this property is available only when reading this bookingAppointment by its ID.
    */
    private ?array $reminders = null;
    
    /**
     * @var string|null $selfServiceAppointmentId Another tracking ID for the appointment, if the appointment was created directly by the customer on the scheduling page, as opposed to by a staff member on behalf of the customer.
    */
    private ?string $selfServiceAppointmentId = null;
    
    /**
     * @var string|null $serviceId The ID of the bookingService associated with this appointment.
    */
    private ?string $serviceId = null;
    
    /**
     * @var Location|null $serviceLocation The location where the service is delivered.
    */
    private ?Location $serviceLocation = null;
    
    /**
     * @var string|null $serviceName The name of the bookingService associated with this appointment.This property is optional when creating a new appointment. If not specified, it's computed from the service associated with the appointment by the serviceId property.
    */
    private ?string $serviceName = null;
    
    /**
     * @var string|null $serviceNotes Notes from a bookingStaffMember. The value of this property is available only when reading this bookingAppointment by its ID.
    */
    private ?string $serviceNotes = null;
    
    /**
     * @var bool|null $smsNotificationsEnabled If true, indicates SMS notifications will be sent to the customers for the appointment. Default value is false.
    */
    private ?bool $smsNotificationsEnabled = null;
    
    /**
     * @var array<string>|null $staffMemberIds The ID of each bookingStaffMember who is scheduled in this appointment.
    */
    private ?array $staffMemberIds = null;
    
    /**
     * @var DateTimeTimeZone|null $startDateTime The startDateTime property
    */
    private ?DateTimeTimeZone $startDateTime = null;
    
    /**
     * Instantiates a new BookingAppointment and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BookingAppointment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BookingAppointment {
        return new BookingAppointment();
    }

    /**
     * Gets the additionalInformation property value. Additional information that is sent to the customer when an appointment is confirmed.
     * @return string|null
    */
    public function getAdditionalInformation(): ?string {
        return $this->additionalInformation;
    }

    /**
     * Gets the anonymousJoinWebUrl property value. The URL of the meeting to join anonymously.
     * @return string|null
    */
    public function getAnonymousJoinWebUrl(): ?string {
        return $this->anonymousJoinWebUrl;
    }

    /**
     * Gets the appointmentLabel property value. The custom label that can be stamped on this appointment by users.
     * @return string|null
    */
    public function getAppointmentLabel(): ?string {
        return $this->appointmentLabel;
    }

    /**
     * Gets the createdDateTime property value. The date, time, and time zone when the appointment was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the customerEmailAddress property value. The SMTP address of the bookingCustomer who books the appointment.
     * @return string|null
    */
    public function getCustomerEmailAddress(): ?string {
        return $this->customerEmailAddress;
    }

    /**
     * Gets the customerName property value. The customer's name.
     * @return string|null
    */
    public function getCustomerName(): ?string {
        return $this->customerName;
    }

    /**
     * Gets the customerNotes property value. Notes from the customer associated with this appointment. You can get the value only when you read this bookingAppointment by its ID. You can set this property only when you initially create an appointment with a new customer.
     * @return string|null
    */
    public function getCustomerNotes(): ?string {
        return $this->customerNotes;
    }

    /**
     * Gets the customerPhone property value. The customer's phone number.
     * @return string|null
    */
    public function getCustomerPhone(): ?string {
        return $this->customerPhone;
    }

    /**
     * Gets the customers property value. A collection of customer properties for an appointment. An appointment contains a list of customer information and each unit will indicate the properties of a customer who is part of that appointment. Optional.
     * @return array<BookingCustomerInformationBase>|null
    */
    public function getCustomers(): ?array {
        return $this->customers;
    }

    /**
     * Gets the customerTimeZone property value. The time zone of the customer. For a list of possible values, see dateTimeTimeZone.
     * @return string|null
    */
    public function getCustomerTimeZone(): ?string {
        return $this->customerTimeZone;
    }

    /**
     * Gets the duration property value. The length of the appointment, denoted in ISO8601 format.
     * @return DateInterval|null
    */
    public function getDuration(): ?DateInterval {
        return $this->duration;
    }

    /**
     * Gets the endDateTime property value. The endDateTime property
     * @return DateTimeTimeZone|null
    */
    public function getEndDateTime(): ?DateTimeTimeZone {
        return $this->endDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'additionalInformation' => fn(ParseNode $n) => $o->setAdditionalInformation($n->getStringValue()),
            'anonymousJoinWebUrl' => fn(ParseNode $n) => $o->setAnonymousJoinWebUrl($n->getStringValue()),
            'appointmentLabel' => fn(ParseNode $n) => $o->setAppointmentLabel($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'customerEmailAddress' => fn(ParseNode $n) => $o->setCustomerEmailAddress($n->getStringValue()),
            'customerName' => fn(ParseNode $n) => $o->setCustomerName($n->getStringValue()),
            'customerNotes' => fn(ParseNode $n) => $o->setCustomerNotes($n->getStringValue()),
            'customerPhone' => fn(ParseNode $n) => $o->setCustomerPhone($n->getStringValue()),
            'customers' => fn(ParseNode $n) => $o->setCustomers($n->getCollectionOfObjectValues([BookingCustomerInformationBase::class, 'createFromDiscriminatorValue'])),
            'customerTimeZone' => fn(ParseNode $n) => $o->setCustomerTimeZone($n->getStringValue()),
            'duration' => fn(ParseNode $n) => $o->setDuration($n->getDateIntervalValue()),
            'endDateTime' => fn(ParseNode $n) => $o->setEndDateTime($n->getObjectValue([DateTimeTimeZone::class, 'createFromDiscriminatorValue'])),
            'filledAttendeesCount' => fn(ParseNode $n) => $o->setFilledAttendeesCount($n->getIntegerValue()),
            'isCustomerAllowedToManageBooking' => fn(ParseNode $n) => $o->setIsCustomerAllowedToManageBooking($n->getBooleanValue()),
            'isLocationOnline' => fn(ParseNode $n) => $o->setIsLocationOnline($n->getBooleanValue()),
            'joinWebUrl' => fn(ParseNode $n) => $o->setJoinWebUrl($n->getStringValue()),
            'lastUpdatedDateTime' => fn(ParseNode $n) => $o->setLastUpdatedDateTime($n->getDateTimeValue()),
            'maximumAttendeesCount' => fn(ParseNode $n) => $o->setMaximumAttendeesCount($n->getIntegerValue()),
            'optOutOfCustomerEmail' => fn(ParseNode $n) => $o->setOptOutOfCustomerEmail($n->getBooleanValue()),
            'postBuffer' => fn(ParseNode $n) => $o->setPostBuffer($n->getDateIntervalValue()),
            'preBuffer' => fn(ParseNode $n) => $o->setPreBuffer($n->getDateIntervalValue()),
            'price' => fn(ParseNode $n) => $o->setPrice($n->getFloatValue()),
            'priceType' => fn(ParseNode $n) => $o->setPriceType($n->getEnumValue(BookingPriceType::class)),
            'reminders' => fn(ParseNode $n) => $o->setReminders($n->getCollectionOfObjectValues([BookingReminder::class, 'createFromDiscriminatorValue'])),
            'selfServiceAppointmentId' => fn(ParseNode $n) => $o->setSelfServiceAppointmentId($n->getStringValue()),
            'serviceId' => fn(ParseNode $n) => $o->setServiceId($n->getStringValue()),
            'serviceLocation' => fn(ParseNode $n) => $o->setServiceLocation($n->getObjectValue([Location::class, 'createFromDiscriminatorValue'])),
            'serviceName' => fn(ParseNode $n) => $o->setServiceName($n->getStringValue()),
            'serviceNotes' => fn(ParseNode $n) => $o->setServiceNotes($n->getStringValue()),
            'smsNotificationsEnabled' => fn(ParseNode $n) => $o->setSmsNotificationsEnabled($n->getBooleanValue()),
            'staffMemberIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setStaffMemberIds($val);
            },
            'startDateTime' => fn(ParseNode $n) => $o->setStartDateTime($n->getObjectValue([DateTimeTimeZone::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the filledAttendeesCount property value. The current number of customers in the appointment.
     * @return int|null
    */
    public function getFilledAttendeesCount(): ?int {
        return $this->filledAttendeesCount;
    }

    /**
     * Gets the isCustomerAllowedToManageBooking property value. Indicates that the customer can manage bookings created by the staff. The default value is false.
     * @return bool|null
    */
    public function getIsCustomerAllowedToManageBooking(): ?bool {
        return $this->isCustomerAllowedToManageBooking;
    }

    /**
     * Gets the isLocationOnline property value. Indicates that the appointment is held online. The default value is false.
     * @return bool|null
    */
    public function getIsLocationOnline(): ?bool {
        return $this->isLocationOnline;
    }

    /**
     * Gets the joinWebUrl property value. The URL of the online meeting for the appointment.
     * @return string|null
    */
    public function getJoinWebUrl(): ?string {
        return $this->joinWebUrl;
    }

    /**
     * Gets the lastUpdatedDateTime property value. The date, time, and time zone when the booking business was last updated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastUpdatedDateTime(): ?DateTime {
        return $this->lastUpdatedDateTime;
    }

    /**
     * Gets the maximumAttendeesCount property value. The maximum number of customers allowed in an appointment. If maximumAttendeesCount of the service is greater than 1, pass valid customer IDs while creating or updating an appointment. To create a customer, use the Create bookingCustomer operation.
     * @return int|null
    */
    public function getMaximumAttendeesCount(): ?int {
        return $this->maximumAttendeesCount;
    }

    /**
     * Gets the optOutOfCustomerEmail property value. If true indicates that the bookingCustomer for this appointment doesn't wish to receive a confirmation for this appointment.
     * @return bool|null
    */
    public function getOptOutOfCustomerEmail(): ?bool {
        return $this->optOutOfCustomerEmail;
    }

    /**
     * Gets the postBuffer property value. The amount of time to reserve after the appointment ends, for cleaning up, as an example. The value is expressed in ISO8601 format.
     * @return DateInterval|null
    */
    public function getPostBuffer(): ?DateInterval {
        return $this->postBuffer;
    }

    /**
     * Gets the preBuffer property value. The amount of time to reserve before the appointment begins, for preparation, as an example. The value is expressed in ISO8601 format.
     * @return DateInterval|null
    */
    public function getPreBuffer(): ?DateInterval {
        return $this->preBuffer;
    }

    /**
     * Gets the price property value. The regular price for an appointment for the specified bookingService.
     * @return float|null
    */
    public function getPrice(): ?float {
        return $this->price;
    }

    /**
     * Gets the priceType property value. Represents the type of pricing of a booking service.
     * @return BookingPriceType|null
    */
    public function getPriceType(): ?BookingPriceType {
        return $this->priceType;
    }

    /**
     * Gets the reminders property value. The collection of customer reminders sent for this appointment. The value of this property is available only when reading this bookingAppointment by its ID.
     * @return array<BookingReminder>|null
    */
    public function getReminders(): ?array {
        return $this->reminders;
    }

    /**
     * Gets the selfServiceAppointmentId property value. Another tracking ID for the appointment, if the appointment was created directly by the customer on the scheduling page, as opposed to by a staff member on behalf of the customer.
     * @return string|null
    */
    public function getSelfServiceAppointmentId(): ?string {
        return $this->selfServiceAppointmentId;
    }

    /**
     * Gets the serviceId property value. The ID of the bookingService associated with this appointment.
     * @return string|null
    */
    public function getServiceId(): ?string {
        return $this->serviceId;
    }

    /**
     * Gets the serviceLocation property value. The location where the service is delivered.
     * @return Location|null
    */
    public function getServiceLocation(): ?Location {
        return $this->serviceLocation;
    }

    /**
     * Gets the serviceName property value. The name of the bookingService associated with this appointment.This property is optional when creating a new appointment. If not specified, it's computed from the service associated with the appointment by the serviceId property.
     * @return string|null
    */
    public function getServiceName(): ?string {
        return $this->serviceName;
    }

    /**
     * Gets the serviceNotes property value. Notes from a bookingStaffMember. The value of this property is available only when reading this bookingAppointment by its ID.
     * @return string|null
    */
    public function getServiceNotes(): ?string {
        return $this->serviceNotes;
    }

    /**
     * Gets the smsNotificationsEnabled property value. If true, indicates SMS notifications will be sent to the customers for the appointment. Default value is false.
     * @return bool|null
    */
    public function getSmsNotificationsEnabled(): ?bool {
        return $this->smsNotificationsEnabled;
    }

    /**
     * Gets the staffMemberIds property value. The ID of each bookingStaffMember who is scheduled in this appointment.
     * @return array<string>|null
    */
    public function getStaffMemberIds(): ?array {
        return $this->staffMemberIds;
    }

    /**
     * Gets the startDateTime property value. The startDateTime property
     * @return DateTimeTimeZone|null
    */
    public function getStartDateTime(): ?DateTimeTimeZone {
        return $this->startDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('additionalInformation', $this->getAdditionalInformation());
        $writer->writeStringValue('anonymousJoinWebUrl', $this->getAnonymousJoinWebUrl());
        $writer->writeStringValue('appointmentLabel', $this->getAppointmentLabel());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('customerEmailAddress', $this->getCustomerEmailAddress());
        $writer->writeStringValue('customerName', $this->getCustomerName());
        $writer->writeStringValue('customerNotes', $this->getCustomerNotes());
        $writer->writeStringValue('customerPhone', $this->getCustomerPhone());
        $writer->writeCollectionOfObjectValues('customers', $this->getCustomers());
        $writer->writeStringValue('customerTimeZone', $this->getCustomerTimeZone());
        $writer->writeObjectValue('endDateTime', $this->getEndDateTime());
        $writer->writeBooleanValue('isCustomerAllowedToManageBooking', $this->getIsCustomerAllowedToManageBooking());
        $writer->writeBooleanValue('isLocationOnline', $this->getIsLocationOnline());
        $writer->writeStringValue('joinWebUrl', $this->getJoinWebUrl());
        $writer->writeDateTimeValue('lastUpdatedDateTime', $this->getLastUpdatedDateTime());
        $writer->writeIntegerValue('maximumAttendeesCount', $this->getMaximumAttendeesCount());
        $writer->writeBooleanValue('optOutOfCustomerEmail', $this->getOptOutOfCustomerEmail());
        $writer->writeDateIntervalValue('postBuffer', $this->getPostBuffer());
        $writer->writeDateIntervalValue('preBuffer', $this->getPreBuffer());
        $writer->writeFloatValue('price', $this->getPrice());
        $writer->writeEnumValue('priceType', $this->getPriceType());
        $writer->writeCollectionOfObjectValues('reminders', $this->getReminders());
        $writer->writeStringValue('selfServiceAppointmentId', $this->getSelfServiceAppointmentId());
        $writer->writeStringValue('serviceId', $this->getServiceId());
        $writer->writeObjectValue('serviceLocation', $this->getServiceLocation());
        $writer->writeStringValue('serviceName', $this->getServiceName());
        $writer->writeStringValue('serviceNotes', $this->getServiceNotes());
        $writer->writeBooleanValue('smsNotificationsEnabled', $this->getSmsNotificationsEnabled());
        $writer->writeCollectionOfPrimitiveValues('staffMemberIds', $this->getStaffMemberIds());
        $writer->writeObjectValue('startDateTime', $this->getStartDateTime());
    }

    /**
     * Sets the additionalInformation property value. Additional information that is sent to the customer when an appointment is confirmed.
     * @param string|null $value Value to set for the additionalInformation property.
    */
    public function setAdditionalInformation(?string $value): void {
        $this->additionalInformation = $value;
    }

    /**
     * Sets the anonymousJoinWebUrl property value. The URL of the meeting to join anonymously.
     * @param string|null $value Value to set for the anonymousJoinWebUrl property.
    */
    public function setAnonymousJoinWebUrl(?string $value): void {
        $this->anonymousJoinWebUrl = $value;
    }

    /**
     * Sets the appointmentLabel property value. The custom label that can be stamped on this appointment by users.
     * @param string|null $value Value to set for the appointmentLabel property.
    */
    public function setAppointmentLabel(?string $value): void {
        $this->appointmentLabel = $value;
    }

    /**
     * Sets the createdDateTime property value. The date, time, and time zone when the appointment was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the customerEmailAddress property value. The SMTP address of the bookingCustomer who books the appointment.
     * @param string|null $value Value to set for the customerEmailAddress property.
    */
    public function setCustomerEmailAddress(?string $value): void {
        $this->customerEmailAddress = $value;
    }

    /**
     * Sets the customerName property value. The customer's name.
     * @param string|null $value Value to set for the customerName property.
    */
    public function setCustomerName(?string $value): void {
        $this->customerName = $value;
    }

    /**
     * Sets the customerNotes property value. Notes from the customer associated with this appointment. You can get the value only when you read this bookingAppointment by its ID. You can set this property only when you initially create an appointment with a new customer.
     * @param string|null $value Value to set for the customerNotes property.
    */
    public function setCustomerNotes(?string $value): void {
        $this->customerNotes = $value;
    }

    /**
     * Sets the customerPhone property value. The customer's phone number.
     * @param string|null $value Value to set for the customerPhone property.
    */
    public function setCustomerPhone(?string $value): void {
        $this->customerPhone = $value;
    }

    /**
     * Sets the customers property value. A collection of customer properties for an appointment. An appointment contains a list of customer information and each unit will indicate the properties of a customer who is part of that appointment. Optional.
     * @param array<BookingCustomerInformationBase>|null $value Value to set for the customers property.
    */
    public function setCustomers(?array $value): void {
        $this->customers = $value;
    }

    /**
     * Sets the customerTimeZone property value. The time zone of the customer. For a list of possible values, see dateTimeTimeZone.
     * @param string|null $value Value to set for the customerTimeZone property.
    */
    public function setCustomerTimeZone(?string $value): void {
        $this->customerTimeZone = $value;
    }

    /**
     * Sets the duration property value. The length of the appointment, denoted in ISO8601 format.
     * @param DateInterval|null $value Value to set for the duration property.
    */
    public function setDuration(?DateInterval $value): void {
        $this->duration = $value;
    }

    /**
     * Sets the endDateTime property value. The endDateTime property
     * @param DateTimeTimeZone|null $value Value to set for the endDateTime property.
    */
    public function setEndDateTime(?DateTimeTimeZone $value): void {
        $this->endDateTime = $value;
    }

    /**
     * Sets the filledAttendeesCount property value. The current number of customers in the appointment.
     * @param int|null $value Value to set for the filledAttendeesCount property.
    */
    public function setFilledAttendeesCount(?int $value): void {
        $this->filledAttendeesCount = $value;
    }

    /**
     * Sets the isCustomerAllowedToManageBooking property value. Indicates that the customer can manage bookings created by the staff. The default value is false.
     * @param bool|null $value Value to set for the isCustomerAllowedToManageBooking property.
    */
    public function setIsCustomerAllowedToManageBooking(?bool $value): void {
        $this->isCustomerAllowedToManageBooking = $value;
    }

    /**
     * Sets the isLocationOnline property value. Indicates that the appointment is held online. The default value is false.
     * @param bool|null $value Value to set for the isLocationOnline property.
    */
    public function setIsLocationOnline(?bool $value): void {
        $this->isLocationOnline = $value;
    }

    /**
     * Sets the joinWebUrl property value. The URL of the online meeting for the appointment.
     * @param string|null $value Value to set for the joinWebUrl property.
    */
    public function setJoinWebUrl(?string $value): void {
        $this->joinWebUrl = $value;
    }

    /**
     * Sets the lastUpdatedDateTime property value. The date, time, and time zone when the booking business was last updated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastUpdatedDateTime property.
    */
    public function setLastUpdatedDateTime(?DateTime $value): void {
        $this->lastUpdatedDateTime = $value;
    }

    /**
     * Sets the maximumAttendeesCount property value. The maximum number of customers allowed in an appointment. If maximumAttendeesCount of the service is greater than 1, pass valid customer IDs while creating or updating an appointment. To create a customer, use the Create bookingCustomer operation.
     * @param int|null $value Value to set for the maximumAttendeesCount property.
    */
    public function setMaximumAttendeesCount(?int $value): void {
        $this->maximumAttendeesCount = $value;
    }

    /**
     * Sets the optOutOfCustomerEmail property value. If true indicates that the bookingCustomer for this appointment doesn't wish to receive a confirmation for this appointment.
     * @param bool|null $value Value to set for the optOutOfCustomerEmail property.
    */
    public function setOptOutOfCustomerEmail(?bool $value): void {
        $this->optOutOfCustomerEmail = $value;
    }

    /**
     * Sets the postBuffer property value. The amount of time to reserve after the appointment ends, for cleaning up, as an example. The value is expressed in ISO8601 format.
     * @param DateInterval|null $value Value to set for the postBuffer property.
    */
    public function setPostBuffer(?DateInterval $value): void {
        $this->postBuffer = $value;
    }

    /**
     * Sets the preBuffer property value. The amount of time to reserve before the appointment begins, for preparation, as an example. The value is expressed in ISO8601 format.
     * @param DateInterval|null $value Value to set for the preBuffer property.
    */
    public function setPreBuffer(?DateInterval $value): void {
        $this->preBuffer = $value;
    }

    /**
     * Sets the price property value. The regular price for an appointment for the specified bookingService.
     * @param float|null $value Value to set for the price property.
    */
    public function setPrice(?float $value): void {
        $this->price = $value;
    }

    /**
     * Sets the priceType property value. Represents the type of pricing of a booking service.
     * @param BookingPriceType|null $value Value to set for the priceType property.
    */
    public function setPriceType(?BookingPriceType $value): void {
        $this->priceType = $value;
    }

    /**
     * Sets the reminders property value. The collection of customer reminders sent for this appointment. The value of this property is available only when reading this bookingAppointment by its ID.
     * @param array<BookingReminder>|null $value Value to set for the reminders property.
    */
    public function setReminders(?array $value): void {
        $this->reminders = $value;
    }

    /**
     * Sets the selfServiceAppointmentId property value. Another tracking ID for the appointment, if the appointment was created directly by the customer on the scheduling page, as opposed to by a staff member on behalf of the customer.
     * @param string|null $value Value to set for the selfServiceAppointmentId property.
    */
    public function setSelfServiceAppointmentId(?string $value): void {
        $this->selfServiceAppointmentId = $value;
    }

    /**
     * Sets the serviceId property value. The ID of the bookingService associated with this appointment.
     * @param string|null $value Value to set for the serviceId property.
    */
    public function setServiceId(?string $value): void {
        $this->serviceId = $value;
    }

    /**
     * Sets the serviceLocation property value. The location where the service is delivered.
     * @param Location|null $value Value to set for the serviceLocation property.
    */
    public function setServiceLocation(?Location $value): void {
        $this->serviceLocation = $value;
    }

    /**
     * Sets the serviceName property value. The name of the bookingService associated with this appointment.This property is optional when creating a new appointment. If not specified, it's computed from the service associated with the appointment by the serviceId property.
     * @param string|null $value Value to set for the serviceName property.
    */
    public function setServiceName(?string $value): void {
        $this->serviceName = $value;
    }

    /**
     * Sets the serviceNotes property value. Notes from a bookingStaffMember. The value of this property is available only when reading this bookingAppointment by its ID.
     * @param string|null $value Value to set for the serviceNotes property.
    */
    public function setServiceNotes(?string $value): void {
        $this->serviceNotes = $value;
    }

    /**
     * Sets the smsNotificationsEnabled property value. If true, indicates SMS notifications will be sent to the customers for the appointment. Default value is false.
     * @param bool|null $value Value to set for the smsNotificationsEnabled property.
    */
    public function setSmsNotificationsEnabled(?bool $value): void {
        $this->smsNotificationsEnabled = $value;
    }

    /**
     * Sets the staffMemberIds property value. The ID of each bookingStaffMember who is scheduled in this appointment.
     * @param array<string>|null $value Value to set for the staffMemberIds property.
    */
    public function setStaffMemberIds(?array $value): void {
        $this->staffMemberIds = $value;
    }

    /**
     * Sets the startDateTime property value. The startDateTime property
     * @param DateTimeTimeZone|null $value Value to set for the startDateTime property.
    */
    public function setStartDateTime(?DateTimeTimeZone $value): void {
        $this->startDateTime = $value;
    }

}
