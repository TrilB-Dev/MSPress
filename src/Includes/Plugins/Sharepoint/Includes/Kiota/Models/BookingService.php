<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateInterval;
use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * Represents a particular service offered by a booking business.
*/
class BookingService extends Entity implements Parsable 
{
    /**
     * @var string|null $additionalInformation Additional information that is sent to the customer when an appointment is confirmed.
    */
    private ?string $additionalInformation = null;
    
    /**
     * @var DateTime|null $createdDateTime The date, time, and time zone when the service was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<BookingQuestionAssignment>|null $customQuestions Contains the set of custom questions associated with a particular service.
    */
    private ?array $customQuestions = null;
    
    /**
     * @var DateInterval|null $defaultDuration The default length of the service, represented in numbers of days, hours, minutes, and seconds. For example, P11D23H59M59.999999999999S.
    */
    private ?DateInterval $defaultDuration = null;
    
    /**
     * @var Location|null $defaultLocation The default physical location for the service.
    */
    private ?Location $defaultLocation = null;
    
    /**
     * @var float|null $defaultPrice The default monetary price for the service.
    */
    private ?float $defaultPrice = null;
    
    /**
     * @var BookingPriceType|null $defaultPriceType Represents the type of pricing of a booking service.
    */
    private ?BookingPriceType $defaultPriceType = null;
    
    /**
     * @var array<BookingReminder>|null $defaultReminders The default set of reminders for an appointment of this service. The value of this property is available only when reading this bookingService by its ID.
    */
    private ?array $defaultReminders = null;
    
    /**
     * @var string|null $description A text description for the service.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName A service name.
    */
    private ?string $displayName = null;
    
    /**
     * @var bool|null $isAnonymousJoinEnabled Indicates if an anonymousJoinWebUrl(webrtcUrl) is generated for the appointment booked for this service. The default value is false.
    */
    private ?bool $isAnonymousJoinEnabled = null;
    
    /**
     * @var bool|null $isCustomerAllowedToManageBooking Indicates that the customer can manage bookings created by the staff. The default value is false.
    */
    private ?bool $isCustomerAllowedToManageBooking = null;
    
    /**
     * @var bool|null $isHiddenFromCustomers True indicates that this service isn't available to customers for booking.
    */
    private ?bool $isHiddenFromCustomers = null;
    
    /**
     * @var bool|null $isLocationOnline Indicates that the appointments for the service are held online. The default value is false.
    */
    private ?bool $isLocationOnline = null;
    
    /**
     * @var string|null $languageTag The language of the self-service booking page.
    */
    private ?string $languageTag = null;
    
    /**
     * @var DateTime|null $lastUpdatedDateTime The date, time, and time zone when the service was last updated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastUpdatedDateTime = null;
    
    /**
     * @var int|null $maximumAttendeesCount The maximum number of customers allowed in a service. If maximumAttendeesCount of the service is greater than 1, pass valid customer IDs while creating or updating an appointment. To create a customer, use the Create bookingCustomer operation.
    */
    private ?int $maximumAttendeesCount = null;
    
    /**
     * @var string|null $notes Additional information about this service.
    */
    private ?string $notes = null;
    
    /**
     * @var DateInterval|null $postBuffer The time to buffer after an appointment for this service ends, and before the next customer appointment can be booked.
    */
    private ?DateInterval $postBuffer = null;
    
    /**
     * @var DateInterval|null $preBuffer The time to buffer before an appointment for this service can start.
    */
    private ?DateInterval $preBuffer = null;
    
    /**
     * @var BookingSchedulingPolicy|null $schedulingPolicy The set of policies that determine how appointments for this type of service should be created and managed.
    */
    private ?BookingSchedulingPolicy $schedulingPolicy = null;
    
    /**
     * @var bool|null $smsNotificationsEnabled True indicates SMS notifications can be sent to the customers for the appointment of the service. Default value is false.
    */
    private ?bool $smsNotificationsEnabled = null;
    
    /**
     * @var array<string>|null $staffMemberIds Represents those staff members who provide this service.
    */
    private ?array $staffMemberIds = null;
    
    /**
     * @var string|null $webUrl The URL a customer uses to access the service.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new BookingService and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BookingService
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BookingService {
        return new BookingService();
    }

    /**
     * Gets the additionalInformation property value. Additional information that is sent to the customer when an appointment is confirmed.
     * @return string|null
    */
    public function getAdditionalInformation(): ?string {
        return $this->additionalInformation;
    }

    /**
     * Gets the createdDateTime property value. The date, time, and time zone when the service was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the customQuestions property value. Contains the set of custom questions associated with a particular service.
     * @return array<BookingQuestionAssignment>|null
    */
    public function getCustomQuestions(): ?array {
        return $this->customQuestions;
    }

    /**
     * Gets the defaultDuration property value. The default length of the service, represented in numbers of days, hours, minutes, and seconds. For example, P11D23H59M59.999999999999S.
     * @return DateInterval|null
    */
    public function getDefaultDuration(): ?DateInterval {
        return $this->defaultDuration;
    }

    /**
     * Gets the defaultLocation property value. The default physical location for the service.
     * @return Location|null
    */
    public function getDefaultLocation(): ?Location {
        return $this->defaultLocation;
    }

    /**
     * Gets the defaultPrice property value. The default monetary price for the service.
     * @return float|null
    */
    public function getDefaultPrice(): ?float {
        return $this->defaultPrice;
    }

    /**
     * Gets the defaultPriceType property value. Represents the type of pricing of a booking service.
     * @return BookingPriceType|null
    */
    public function getDefaultPriceType(): ?BookingPriceType {
        return $this->defaultPriceType;
    }

    /**
     * Gets the defaultReminders property value. The default set of reminders for an appointment of this service. The value of this property is available only when reading this bookingService by its ID.
     * @return array<BookingReminder>|null
    */
    public function getDefaultReminders(): ?array {
        return $this->defaultReminders;
    }

    /**
     * Gets the description property value. A text description for the service.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. A service name.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'additionalInformation' => fn(ParseNode $n) => $o->setAdditionalInformation($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'customQuestions' => fn(ParseNode $n) => $o->setCustomQuestions($n->getCollectionOfObjectValues([BookingQuestionAssignment::class, 'createFromDiscriminatorValue'])),
            'defaultDuration' => fn(ParseNode $n) => $o->setDefaultDuration($n->getDateIntervalValue()),
            'defaultLocation' => fn(ParseNode $n) => $o->setDefaultLocation($n->getObjectValue([Location::class, 'createFromDiscriminatorValue'])),
            'defaultPrice' => fn(ParseNode $n) => $o->setDefaultPrice($n->getFloatValue()),
            'defaultPriceType' => fn(ParseNode $n) => $o->setDefaultPriceType($n->getEnumValue(BookingPriceType::class)),
            'defaultReminders' => fn(ParseNode $n) => $o->setDefaultReminders($n->getCollectionOfObjectValues([BookingReminder::class, 'createFromDiscriminatorValue'])),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'isAnonymousJoinEnabled' => fn(ParseNode $n) => $o->setIsAnonymousJoinEnabled($n->getBooleanValue()),
            'isCustomerAllowedToManageBooking' => fn(ParseNode $n) => $o->setIsCustomerAllowedToManageBooking($n->getBooleanValue()),
            'isHiddenFromCustomers' => fn(ParseNode $n) => $o->setIsHiddenFromCustomers($n->getBooleanValue()),
            'isLocationOnline' => fn(ParseNode $n) => $o->setIsLocationOnline($n->getBooleanValue()),
            'languageTag' => fn(ParseNode $n) => $o->setLanguageTag($n->getStringValue()),
            'lastUpdatedDateTime' => fn(ParseNode $n) => $o->setLastUpdatedDateTime($n->getDateTimeValue()),
            'maximumAttendeesCount' => fn(ParseNode $n) => $o->setMaximumAttendeesCount($n->getIntegerValue()),
            'notes' => fn(ParseNode $n) => $o->setNotes($n->getStringValue()),
            'postBuffer' => fn(ParseNode $n) => $o->setPostBuffer($n->getDateIntervalValue()),
            'preBuffer' => fn(ParseNode $n) => $o->setPreBuffer($n->getDateIntervalValue()),
            'schedulingPolicy' => fn(ParseNode $n) => $o->setSchedulingPolicy($n->getObjectValue([BookingSchedulingPolicy::class, 'createFromDiscriminatorValue'])),
            'smsNotificationsEnabled' => fn(ParseNode $n) => $o->setSmsNotificationsEnabled($n->getBooleanValue()),
            'staffMemberIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setStaffMemberIds($val);
            },
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isAnonymousJoinEnabled property value. Indicates if an anonymousJoinWebUrl(webrtcUrl) is generated for the appointment booked for this service. The default value is false.
     * @return bool|null
    */
    public function getIsAnonymousJoinEnabled(): ?bool {
        return $this->isAnonymousJoinEnabled;
    }

    /**
     * Gets the isCustomerAllowedToManageBooking property value. Indicates that the customer can manage bookings created by the staff. The default value is false.
     * @return bool|null
    */
    public function getIsCustomerAllowedToManageBooking(): ?bool {
        return $this->isCustomerAllowedToManageBooking;
    }

    /**
     * Gets the isHiddenFromCustomers property value. True indicates that this service isn't available to customers for booking.
     * @return bool|null
    */
    public function getIsHiddenFromCustomers(): ?bool {
        return $this->isHiddenFromCustomers;
    }

    /**
     * Gets the isLocationOnline property value. Indicates that the appointments for the service are held online. The default value is false.
     * @return bool|null
    */
    public function getIsLocationOnline(): ?bool {
        return $this->isLocationOnline;
    }

    /**
     * Gets the languageTag property value. The language of the self-service booking page.
     * @return string|null
    */
    public function getLanguageTag(): ?string {
        return $this->languageTag;
    }

    /**
     * Gets the lastUpdatedDateTime property value. The date, time, and time zone when the service was last updated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastUpdatedDateTime(): ?DateTime {
        return $this->lastUpdatedDateTime;
    }

    /**
     * Gets the maximumAttendeesCount property value. The maximum number of customers allowed in a service. If maximumAttendeesCount of the service is greater than 1, pass valid customer IDs while creating or updating an appointment. To create a customer, use the Create bookingCustomer operation.
     * @return int|null
    */
    public function getMaximumAttendeesCount(): ?int {
        return $this->maximumAttendeesCount;
    }

    /**
     * Gets the notes property value. Additional information about this service.
     * @return string|null
    */
    public function getNotes(): ?string {
        return $this->notes;
    }

    /**
     * Gets the postBuffer property value. The time to buffer after an appointment for this service ends, and before the next customer appointment can be booked.
     * @return DateInterval|null
    */
    public function getPostBuffer(): ?DateInterval {
        return $this->postBuffer;
    }

    /**
     * Gets the preBuffer property value. The time to buffer before an appointment for this service can start.
     * @return DateInterval|null
    */
    public function getPreBuffer(): ?DateInterval {
        return $this->preBuffer;
    }

    /**
     * Gets the schedulingPolicy property value. The set of policies that determine how appointments for this type of service should be created and managed.
     * @return BookingSchedulingPolicy|null
    */
    public function getSchedulingPolicy(): ?BookingSchedulingPolicy {
        return $this->schedulingPolicy;
    }

    /**
     * Gets the smsNotificationsEnabled property value. True indicates SMS notifications can be sent to the customers for the appointment of the service. Default value is false.
     * @return bool|null
    */
    public function getSmsNotificationsEnabled(): ?bool {
        return $this->smsNotificationsEnabled;
    }

    /**
     * Gets the staffMemberIds property value. Represents those staff members who provide this service.
     * @return array<string>|null
    */
    public function getStaffMemberIds(): ?array {
        return $this->staffMemberIds;
    }

    /**
     * Gets the webUrl property value. The URL a customer uses to access the service.
     * @return string|null
    */
    public function getWebUrl(): ?string {
        return $this->webUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('additionalInformation', $this->getAdditionalInformation());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('customQuestions', $this->getCustomQuestions());
        $writer->writeDateIntervalValue('defaultDuration', $this->getDefaultDuration());
        $writer->writeObjectValue('defaultLocation', $this->getDefaultLocation());
        $writer->writeFloatValue('defaultPrice', $this->getDefaultPrice());
        $writer->writeEnumValue('defaultPriceType', $this->getDefaultPriceType());
        $writer->writeCollectionOfObjectValues('defaultReminders', $this->getDefaultReminders());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeBooleanValue('isAnonymousJoinEnabled', $this->getIsAnonymousJoinEnabled());
        $writer->writeBooleanValue('isCustomerAllowedToManageBooking', $this->getIsCustomerAllowedToManageBooking());
        $writer->writeBooleanValue('isHiddenFromCustomers', $this->getIsHiddenFromCustomers());
        $writer->writeBooleanValue('isLocationOnline', $this->getIsLocationOnline());
        $writer->writeStringValue('languageTag', $this->getLanguageTag());
        $writer->writeDateTimeValue('lastUpdatedDateTime', $this->getLastUpdatedDateTime());
        $writer->writeIntegerValue('maximumAttendeesCount', $this->getMaximumAttendeesCount());
        $writer->writeStringValue('notes', $this->getNotes());
        $writer->writeDateIntervalValue('postBuffer', $this->getPostBuffer());
        $writer->writeDateIntervalValue('preBuffer', $this->getPreBuffer());
        $writer->writeObjectValue('schedulingPolicy', $this->getSchedulingPolicy());
        $writer->writeBooleanValue('smsNotificationsEnabled', $this->getSmsNotificationsEnabled());
        $writer->writeCollectionOfPrimitiveValues('staffMemberIds', $this->getStaffMemberIds());
    }

    /**
     * Sets the additionalInformation property value. Additional information that is sent to the customer when an appointment is confirmed.
     * @param string|null $value Value to set for the additionalInformation property.
    */
    public function setAdditionalInformation(?string $value): void {
        $this->additionalInformation = $value;
    }

    /**
     * Sets the createdDateTime property value. The date, time, and time zone when the service was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the customQuestions property value. Contains the set of custom questions associated with a particular service.
     * @param array<BookingQuestionAssignment>|null $value Value to set for the customQuestions property.
    */
    public function setCustomQuestions(?array $value): void {
        $this->customQuestions = $value;
    }

    /**
     * Sets the defaultDuration property value. The default length of the service, represented in numbers of days, hours, minutes, and seconds. For example, P11D23H59M59.999999999999S.
     * @param DateInterval|null $value Value to set for the defaultDuration property.
    */
    public function setDefaultDuration(?DateInterval $value): void {
        $this->defaultDuration = $value;
    }

    /**
     * Sets the defaultLocation property value. The default physical location for the service.
     * @param Location|null $value Value to set for the defaultLocation property.
    */
    public function setDefaultLocation(?Location $value): void {
        $this->defaultLocation = $value;
    }

    /**
     * Sets the defaultPrice property value. The default monetary price for the service.
     * @param float|null $value Value to set for the defaultPrice property.
    */
    public function setDefaultPrice(?float $value): void {
        $this->defaultPrice = $value;
    }

    /**
     * Sets the defaultPriceType property value. Represents the type of pricing of a booking service.
     * @param BookingPriceType|null $value Value to set for the defaultPriceType property.
    */
    public function setDefaultPriceType(?BookingPriceType $value): void {
        $this->defaultPriceType = $value;
    }

    /**
     * Sets the defaultReminders property value. The default set of reminders for an appointment of this service. The value of this property is available only when reading this bookingService by its ID.
     * @param array<BookingReminder>|null $value Value to set for the defaultReminders property.
    */
    public function setDefaultReminders(?array $value): void {
        $this->defaultReminders = $value;
    }

    /**
     * Sets the description property value. A text description for the service.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. A service name.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the isAnonymousJoinEnabled property value. Indicates if an anonymousJoinWebUrl(webrtcUrl) is generated for the appointment booked for this service. The default value is false.
     * @param bool|null $value Value to set for the isAnonymousJoinEnabled property.
    */
    public function setIsAnonymousJoinEnabled(?bool $value): void {
        $this->isAnonymousJoinEnabled = $value;
    }

    /**
     * Sets the isCustomerAllowedToManageBooking property value. Indicates that the customer can manage bookings created by the staff. The default value is false.
     * @param bool|null $value Value to set for the isCustomerAllowedToManageBooking property.
    */
    public function setIsCustomerAllowedToManageBooking(?bool $value): void {
        $this->isCustomerAllowedToManageBooking = $value;
    }

    /**
     * Sets the isHiddenFromCustomers property value. True indicates that this service isn't available to customers for booking.
     * @param bool|null $value Value to set for the isHiddenFromCustomers property.
    */
    public function setIsHiddenFromCustomers(?bool $value): void {
        $this->isHiddenFromCustomers = $value;
    }

    /**
     * Sets the isLocationOnline property value. Indicates that the appointments for the service are held online. The default value is false.
     * @param bool|null $value Value to set for the isLocationOnline property.
    */
    public function setIsLocationOnline(?bool $value): void {
        $this->isLocationOnline = $value;
    }

    /**
     * Sets the languageTag property value. The language of the self-service booking page.
     * @param string|null $value Value to set for the languageTag property.
    */
    public function setLanguageTag(?string $value): void {
        $this->languageTag = $value;
    }

    /**
     * Sets the lastUpdatedDateTime property value. The date, time, and time zone when the service was last updated. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastUpdatedDateTime property.
    */
    public function setLastUpdatedDateTime(?DateTime $value): void {
        $this->lastUpdatedDateTime = $value;
    }

    /**
     * Sets the maximumAttendeesCount property value. The maximum number of customers allowed in a service. If maximumAttendeesCount of the service is greater than 1, pass valid customer IDs while creating or updating an appointment. To create a customer, use the Create bookingCustomer operation.
     * @param int|null $value Value to set for the maximumAttendeesCount property.
    */
    public function setMaximumAttendeesCount(?int $value): void {
        $this->maximumAttendeesCount = $value;
    }

    /**
     * Sets the notes property value. Additional information about this service.
     * @param string|null $value Value to set for the notes property.
    */
    public function setNotes(?string $value): void {
        $this->notes = $value;
    }

    /**
     * Sets the postBuffer property value. The time to buffer after an appointment for this service ends, and before the next customer appointment can be booked.
     * @param DateInterval|null $value Value to set for the postBuffer property.
    */
    public function setPostBuffer(?DateInterval $value): void {
        $this->postBuffer = $value;
    }

    /**
     * Sets the preBuffer property value. The time to buffer before an appointment for this service can start.
     * @param DateInterval|null $value Value to set for the preBuffer property.
    */
    public function setPreBuffer(?DateInterval $value): void {
        $this->preBuffer = $value;
    }

    /**
     * Sets the schedulingPolicy property value. The set of policies that determine how appointments for this type of service should be created and managed.
     * @param BookingSchedulingPolicy|null $value Value to set for the schedulingPolicy property.
    */
    public function setSchedulingPolicy(?BookingSchedulingPolicy $value): void {
        $this->schedulingPolicy = $value;
    }

    /**
     * Sets the smsNotificationsEnabled property value. True indicates SMS notifications can be sent to the customers for the appointment of the service. Default value is false.
     * @param bool|null $value Value to set for the smsNotificationsEnabled property.
    */
    public function setSmsNotificationsEnabled(?bool $value): void {
        $this->smsNotificationsEnabled = $value;
    }

    /**
     * Sets the staffMemberIds property value. Represents those staff members who provide this service.
     * @param array<string>|null $value Value to set for the staffMemberIds property.
    */
    public function setStaffMemberIds(?array $value): void {
        $this->staffMemberIds = $value;
    }

    /**
     * Sets the webUrl property value. The URL a customer uses to access the service.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
