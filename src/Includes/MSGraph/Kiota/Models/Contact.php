<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class Contact extends OutlookItem implements Parsable 
{
    /**
     * @var string|null $assistantName The name of the contact's assistant.
    */
    private ?string $assistantName = null;
    
    /**
     * @var DateTime|null $birthday The contact's birthday. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $birthday = null;
    
    /**
     * @var PhysicalAddress|null $businessAddress The contact's business address.
    */
    private ?PhysicalAddress $businessAddress = null;
    
    /**
     * @var string|null $businessHomePage The business home page of the contact.
    */
    private ?string $businessHomePage = null;
    
    /**
     * @var array<string>|null $businessPhones The contact's business phone numbers.
    */
    private ?array $businessPhones = null;
    
    /**
     * @var array<string>|null $children The names of the contact's children.
    */
    private ?array $children = null;
    
    /**
     * @var string|null $companyName The name of the contact's company.
    */
    private ?string $companyName = null;
    
    /**
     * @var string|null $department The contact's department.
    */
    private ?string $department = null;
    
    /**
     * @var string|null $displayName The contact's display name. You can specify the display name in a create or update operation. Note that later updates to other properties may cause an automatically generated value to overwrite the displayName value you have specified. To preserve a pre-existing value, always include it as displayName in an update operation.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<EmailAddress>|null $emailAddresses The contact's email addresses.
    */
    private ?array $emailAddresses = null;
    
    /**
     * @var array<Extension>|null $extensions The collection of open extensions defined for the contact. Read-only. Nullable.
    */
    private ?array $extensions = null;
    
    /**
     * @var string|null $fileAs The name the contact is filed under.
    */
    private ?string $fileAs = null;
    
    /**
     * @var string|null $generation The contact's suffix.
    */
    private ?string $generation = null;
    
    /**
     * @var string|null $givenName The contact's given name.
    */
    private ?string $givenName = null;
    
    /**
     * @var PhysicalAddress|null $homeAddress The contact's home address.
    */
    private ?PhysicalAddress $homeAddress = null;
    
    /**
     * @var array<string>|null $homePhones The contact's home phone numbers.
    */
    private ?array $homePhones = null;
    
    /**
     * @var array<string>|null $imAddresses The contact's instant messaging (IM) addresses.
    */
    private ?array $imAddresses = null;
    
    /**
     * @var string|null $initials The contact's initials.
    */
    private ?string $initials = null;
    
    /**
     * @var string|null $jobTitle The contact’s job title.
    */
    private ?string $jobTitle = null;
    
    /**
     * @var string|null $manager The name of the contact's manager.
    */
    private ?string $manager = null;
    
    /**
     * @var string|null $middleName The contact's middle name.
    */
    private ?string $middleName = null;
    
    /**
     * @var string|null $mobilePhone The contact's mobile phone number.
    */
    private ?string $mobilePhone = null;
    
    /**
     * @var array<MultiValueLegacyExtendedProperty>|null $multiValueExtendedProperties The collection of multi-value extended properties defined for the contact. Read-only. Nullable.
    */
    private ?array $multiValueExtendedProperties = null;
    
    /**
     * @var string|null $nickName The contact's nickname.
    */
    private ?string $nickName = null;
    
    /**
     * @var string|null $officeLocation The location of the contact's office.
    */
    private ?string $officeLocation = null;
    
    /**
     * @var PhysicalAddress|null $otherAddress Other addresses for the contact.
    */
    private ?PhysicalAddress $otherAddress = null;
    
    /**
     * @var string|null $parentFolderId The ID of the contact's parent folder.
    */
    private ?string $parentFolderId = null;
    
    /**
     * @var string|null $personalNotes The user's notes about the contact.
    */
    private ?string $personalNotes = null;
    
    /**
     * @var ProfilePhoto|null $photo Optional contact picture. You can get or set a photo for a contact.
    */
    private ?ProfilePhoto $photo = null;
    
    /**
     * @var EmailAddress|null $primaryEmailAddress The contact's primary email address.
    */
    private ?EmailAddress $primaryEmailAddress = null;
    
    /**
     * @var string|null $profession The contact's profession.
    */
    private ?string $profession = null;
    
    /**
     * @var EmailAddress|null $secondaryEmailAddress The contact's secondary email address.
    */
    private ?EmailAddress $secondaryEmailAddress = null;
    
    /**
     * @var array<SingleValueLegacyExtendedProperty>|null $singleValueExtendedProperties The collection of single-value extended properties defined for the contact. Read-only. Nullable.
    */
    private ?array $singleValueExtendedProperties = null;
    
    /**
     * @var string|null $spouseName The name of the contact's spouse/partner.
    */
    private ?string $spouseName = null;
    
    /**
     * @var string|null $surname The contact's surname.
    */
    private ?string $surname = null;
    
    /**
     * @var EmailAddress|null $tertiaryEmailAddress The contact's tertiary email address.
    */
    private ?EmailAddress $tertiaryEmailAddress = null;
    
    /**
     * @var string|null $title The contact's title.
    */
    private ?string $title = null;
    
    /**
     * @var string|null $yomiCompanyName The phonetic Japanese company name of the contact.
    */
    private ?string $yomiCompanyName = null;
    
    /**
     * @var string|null $yomiGivenName The phonetic Japanese given name (first name) of the contact.
    */
    private ?string $yomiGivenName = null;
    
    /**
     * @var string|null $yomiSurname The phonetic Japanese surname (last name)  of the contact.
    */
    private ?string $yomiSurname = null;
    
    /**
     * Instantiates a new Contact and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.contact');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Contact
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Contact {
        return new Contact();
    }

    /**
     * Gets the assistantName property value. The name of the contact's assistant.
     * @return string|null
    */
    public function getAssistantName(): ?string {
        return $this->assistantName;
    }

    /**
     * Gets the birthday property value. The contact's birthday. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getBirthday(): ?DateTime {
        return $this->birthday;
    }

    /**
     * Gets the businessAddress property value. The contact's business address.
     * @return PhysicalAddress|null
    */
    public function getBusinessAddress(): ?PhysicalAddress {
        return $this->businessAddress;
    }

    /**
     * Gets the businessHomePage property value. The business home page of the contact.
     * @return string|null
    */
    public function getBusinessHomePage(): ?string {
        return $this->businessHomePage;
    }

    /**
     * Gets the businessPhones property value. The contact's business phone numbers.
     * @return array<string>|null
    */
    public function getBusinessPhones(): ?array {
        return $this->businessPhones;
    }

    /**
     * Gets the children property value. The names of the contact's children.
     * @return array<string>|null
    */
    public function getChildren(): ?array {
        return $this->children;
    }

    /**
     * Gets the companyName property value. The name of the contact's company.
     * @return string|null
    */
    public function getCompanyName(): ?string {
        return $this->companyName;
    }

    /**
     * Gets the department property value. The contact's department.
     * @return string|null
    */
    public function getDepartment(): ?string {
        return $this->department;
    }

    /**
     * Gets the displayName property value. The contact's display name. You can specify the display name in a create or update operation. Note that later updates to other properties may cause an automatically generated value to overwrite the displayName value you have specified. To preserve a pre-existing value, always include it as displayName in an update operation.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the emailAddresses property value. The contact's email addresses.
     * @return array<EmailAddress>|null
    */
    public function getEmailAddresses(): ?array {
        return $this->emailAddresses;
    }

    /**
     * Gets the extensions property value. The collection of open extensions defined for the contact. Read-only. Nullable.
     * @return array<Extension>|null
    */
    public function getExtensions(): ?array {
        return $this->extensions;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'assistantName' => fn(ParseNode $n) => $o->setAssistantName($n->getStringValue()),
            'birthday' => fn(ParseNode $n) => $o->setBirthday($n->getDateTimeValue()),
            'businessAddress' => fn(ParseNode $n) => $o->setBusinessAddress($n->getObjectValue([PhysicalAddress::class, 'createFromDiscriminatorValue'])),
            'businessHomePage' => fn(ParseNode $n) => $o->setBusinessHomePage($n->getStringValue()),
            'businessPhones' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setBusinessPhones($val);
            },
            'children' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setChildren($val);
            },
            'companyName' => fn(ParseNode $n) => $o->setCompanyName($n->getStringValue()),
            'department' => fn(ParseNode $n) => $o->setDepartment($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'emailAddresses' => fn(ParseNode $n) => $o->setEmailAddresses($n->getCollectionOfObjectValues([EmailAddress::class, 'createFromDiscriminatorValue'])),
            'extensions' => fn(ParseNode $n) => $o->setExtensions($n->getCollectionOfObjectValues([Extension::class, 'createFromDiscriminatorValue'])),
            'fileAs' => fn(ParseNode $n) => $o->setFileAs($n->getStringValue()),
            'generation' => fn(ParseNode $n) => $o->setGeneration($n->getStringValue()),
            'givenName' => fn(ParseNode $n) => $o->setGivenName($n->getStringValue()),
            'homeAddress' => fn(ParseNode $n) => $o->setHomeAddress($n->getObjectValue([PhysicalAddress::class, 'createFromDiscriminatorValue'])),
            'homePhones' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setHomePhones($val);
            },
            'imAddresses' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setImAddresses($val);
            },
            'initials' => fn(ParseNode $n) => $o->setInitials($n->getStringValue()),
            'jobTitle' => fn(ParseNode $n) => $o->setJobTitle($n->getStringValue()),
            'manager' => fn(ParseNode $n) => $o->setManager($n->getStringValue()),
            'middleName' => fn(ParseNode $n) => $o->setMiddleName($n->getStringValue()),
            'mobilePhone' => fn(ParseNode $n) => $o->setMobilePhone($n->getStringValue()),
            'multiValueExtendedProperties' => fn(ParseNode $n) => $o->setMultiValueExtendedProperties($n->getCollectionOfObjectValues([MultiValueLegacyExtendedProperty::class, 'createFromDiscriminatorValue'])),
            'nickName' => fn(ParseNode $n) => $o->setNickName($n->getStringValue()),
            'officeLocation' => fn(ParseNode $n) => $o->setOfficeLocation($n->getStringValue()),
            'otherAddress' => fn(ParseNode $n) => $o->setOtherAddress($n->getObjectValue([PhysicalAddress::class, 'createFromDiscriminatorValue'])),
            'parentFolderId' => fn(ParseNode $n) => $o->setParentFolderId($n->getStringValue()),
            'personalNotes' => fn(ParseNode $n) => $o->setPersonalNotes($n->getStringValue()),
            'photo' => fn(ParseNode $n) => $o->setPhoto($n->getObjectValue([ProfilePhoto::class, 'createFromDiscriminatorValue'])),
            'primaryEmailAddress' => fn(ParseNode $n) => $o->setPrimaryEmailAddress($n->getObjectValue([EmailAddress::class, 'createFromDiscriminatorValue'])),
            'profession' => fn(ParseNode $n) => $o->setProfession($n->getStringValue()),
            'secondaryEmailAddress' => fn(ParseNode $n) => $o->setSecondaryEmailAddress($n->getObjectValue([EmailAddress::class, 'createFromDiscriminatorValue'])),
            'singleValueExtendedProperties' => fn(ParseNode $n) => $o->setSingleValueExtendedProperties($n->getCollectionOfObjectValues([SingleValueLegacyExtendedProperty::class, 'createFromDiscriminatorValue'])),
            'spouseName' => fn(ParseNode $n) => $o->setSpouseName($n->getStringValue()),
            'surname' => fn(ParseNode $n) => $o->setSurname($n->getStringValue()),
            'tertiaryEmailAddress' => fn(ParseNode $n) => $o->setTertiaryEmailAddress($n->getObjectValue([EmailAddress::class, 'createFromDiscriminatorValue'])),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
            'yomiCompanyName' => fn(ParseNode $n) => $o->setYomiCompanyName($n->getStringValue()),
            'yomiGivenName' => fn(ParseNode $n) => $o->setYomiGivenName($n->getStringValue()),
            'yomiSurname' => fn(ParseNode $n) => $o->setYomiSurname($n->getStringValue()),
        ]);
    }

    /**
     * Gets the fileAs property value. The name the contact is filed under.
     * @return string|null
    */
    public function getFileAs(): ?string {
        return $this->fileAs;
    }

    /**
     * Gets the generation property value. The contact's suffix.
     * @return string|null
    */
    public function getGeneration(): ?string {
        return $this->generation;
    }

    /**
     * Gets the givenName property value. The contact's given name.
     * @return string|null
    */
    public function getGivenName(): ?string {
        return $this->givenName;
    }

    /**
     * Gets the homeAddress property value. The contact's home address.
     * @return PhysicalAddress|null
    */
    public function getHomeAddress(): ?PhysicalAddress {
        return $this->homeAddress;
    }

    /**
     * Gets the homePhones property value. The contact's home phone numbers.
     * @return array<string>|null
    */
    public function getHomePhones(): ?array {
        return $this->homePhones;
    }

    /**
     * Gets the imAddresses property value. The contact's instant messaging (IM) addresses.
     * @return array<string>|null
    */
    public function getImAddresses(): ?array {
        return $this->imAddresses;
    }

    /**
     * Gets the initials property value. The contact's initials.
     * @return string|null
    */
    public function getInitials(): ?string {
        return $this->initials;
    }

    /**
     * Gets the jobTitle property value. The contact’s job title.
     * @return string|null
    */
    public function getJobTitle(): ?string {
        return $this->jobTitle;
    }

    /**
     * Gets the manager property value. The name of the contact's manager.
     * @return string|null
    */
    public function getManager(): ?string {
        return $this->manager;
    }

    /**
     * Gets the middleName property value. The contact's middle name.
     * @return string|null
    */
    public function getMiddleName(): ?string {
        return $this->middleName;
    }

    /**
     * Gets the mobilePhone property value. The contact's mobile phone number.
     * @return string|null
    */
    public function getMobilePhone(): ?string {
        return $this->mobilePhone;
    }

    /**
     * Gets the multiValueExtendedProperties property value. The collection of multi-value extended properties defined for the contact. Read-only. Nullable.
     * @return array<MultiValueLegacyExtendedProperty>|null
    */
    public function getMultiValueExtendedProperties(): ?array {
        return $this->multiValueExtendedProperties;
    }

    /**
     * Gets the nickName property value. The contact's nickname.
     * @return string|null
    */
    public function getNickName(): ?string {
        return $this->nickName;
    }

    /**
     * Gets the officeLocation property value. The location of the contact's office.
     * @return string|null
    */
    public function getOfficeLocation(): ?string {
        return $this->officeLocation;
    }

    /**
     * Gets the otherAddress property value. Other addresses for the contact.
     * @return PhysicalAddress|null
    */
    public function getOtherAddress(): ?PhysicalAddress {
        return $this->otherAddress;
    }

    /**
     * Gets the parentFolderId property value. The ID of the contact's parent folder.
     * @return string|null
    */
    public function getParentFolderId(): ?string {
        return $this->parentFolderId;
    }

    /**
     * Gets the personalNotes property value. The user's notes about the contact.
     * @return string|null
    */
    public function getPersonalNotes(): ?string {
        return $this->personalNotes;
    }

    /**
     * Gets the photo property value. Optional contact picture. You can get or set a photo for a contact.
     * @return ProfilePhoto|null
    */
    public function getPhoto(): ?ProfilePhoto {
        return $this->photo;
    }

    /**
     * Gets the primaryEmailAddress property value. The contact's primary email address.
     * @return EmailAddress|null
    */
    public function getPrimaryEmailAddress(): ?EmailAddress {
        return $this->primaryEmailAddress;
    }

    /**
     * Gets the profession property value. The contact's profession.
     * @return string|null
    */
    public function getProfession(): ?string {
        return $this->profession;
    }

    /**
     * Gets the secondaryEmailAddress property value. The contact's secondary email address.
     * @return EmailAddress|null
    */
    public function getSecondaryEmailAddress(): ?EmailAddress {
        return $this->secondaryEmailAddress;
    }

    /**
     * Gets the singleValueExtendedProperties property value. The collection of single-value extended properties defined for the contact. Read-only. Nullable.
     * @return array<SingleValueLegacyExtendedProperty>|null
    */
    public function getSingleValueExtendedProperties(): ?array {
        return $this->singleValueExtendedProperties;
    }

    /**
     * Gets the spouseName property value. The name of the contact's spouse/partner.
     * @return string|null
    */
    public function getSpouseName(): ?string {
        return $this->spouseName;
    }

    /**
     * Gets the surname property value. The contact's surname.
     * @return string|null
    */
    public function getSurname(): ?string {
        return $this->surname;
    }

    /**
     * Gets the tertiaryEmailAddress property value. The contact's tertiary email address.
     * @return EmailAddress|null
    */
    public function getTertiaryEmailAddress(): ?EmailAddress {
        return $this->tertiaryEmailAddress;
    }

    /**
     * Gets the title property value. The contact's title.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Gets the yomiCompanyName property value. The phonetic Japanese company name of the contact.
     * @return string|null
    */
    public function getYomiCompanyName(): ?string {
        return $this->yomiCompanyName;
    }

    /**
     * Gets the yomiGivenName property value. The phonetic Japanese given name (first name) of the contact.
     * @return string|null
    */
    public function getYomiGivenName(): ?string {
        return $this->yomiGivenName;
    }

    /**
     * Gets the yomiSurname property value. The phonetic Japanese surname (last name)  of the contact.
     * @return string|null
    */
    public function getYomiSurname(): ?string {
        return $this->yomiSurname;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('assistantName', $this->getAssistantName());
        $writer->writeDateTimeValue('birthday', $this->getBirthday());
        $writer->writeObjectValue('businessAddress', $this->getBusinessAddress());
        $writer->writeStringValue('businessHomePage', $this->getBusinessHomePage());
        $writer->writeCollectionOfPrimitiveValues('businessPhones', $this->getBusinessPhones());
        $writer->writeCollectionOfPrimitiveValues('children', $this->getChildren());
        $writer->writeStringValue('companyName', $this->getCompanyName());
        $writer->writeStringValue('department', $this->getDepartment());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('emailAddresses', $this->getEmailAddresses());
        $writer->writeCollectionOfObjectValues('extensions', $this->getExtensions());
        $writer->writeStringValue('fileAs', $this->getFileAs());
        $writer->writeStringValue('generation', $this->getGeneration());
        $writer->writeStringValue('givenName', $this->getGivenName());
        $writer->writeObjectValue('homeAddress', $this->getHomeAddress());
        $writer->writeCollectionOfPrimitiveValues('homePhones', $this->getHomePhones());
        $writer->writeCollectionOfPrimitiveValues('imAddresses', $this->getImAddresses());
        $writer->writeStringValue('initials', $this->getInitials());
        $writer->writeStringValue('jobTitle', $this->getJobTitle());
        $writer->writeStringValue('manager', $this->getManager());
        $writer->writeStringValue('middleName', $this->getMiddleName());
        $writer->writeStringValue('mobilePhone', $this->getMobilePhone());
        $writer->writeCollectionOfObjectValues('multiValueExtendedProperties', $this->getMultiValueExtendedProperties());
        $writer->writeStringValue('nickName', $this->getNickName());
        $writer->writeStringValue('officeLocation', $this->getOfficeLocation());
        $writer->writeObjectValue('otherAddress', $this->getOtherAddress());
        $writer->writeStringValue('parentFolderId', $this->getParentFolderId());
        $writer->writeStringValue('personalNotes', $this->getPersonalNotes());
        $writer->writeObjectValue('photo', $this->getPhoto());
        $writer->writeObjectValue('primaryEmailAddress', $this->getPrimaryEmailAddress());
        $writer->writeStringValue('profession', $this->getProfession());
        $writer->writeObjectValue('secondaryEmailAddress', $this->getSecondaryEmailAddress());
        $writer->writeCollectionOfObjectValues('singleValueExtendedProperties', $this->getSingleValueExtendedProperties());
        $writer->writeStringValue('spouseName', $this->getSpouseName());
        $writer->writeStringValue('surname', $this->getSurname());
        $writer->writeObjectValue('tertiaryEmailAddress', $this->getTertiaryEmailAddress());
        $writer->writeStringValue('title', $this->getTitle());
        $writer->writeStringValue('yomiCompanyName', $this->getYomiCompanyName());
        $writer->writeStringValue('yomiGivenName', $this->getYomiGivenName());
        $writer->writeStringValue('yomiSurname', $this->getYomiSurname());
    }

    /**
     * Sets the assistantName property value. The name of the contact's assistant.
     * @param string|null $value Value to set for the assistantName property.
    */
    public function setAssistantName(?string $value): void {
        $this->assistantName = $value;
    }

    /**
     * Sets the birthday property value. The contact's birthday. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the birthday property.
    */
    public function setBirthday(?DateTime $value): void {
        $this->birthday = $value;
    }

    /**
     * Sets the businessAddress property value. The contact's business address.
     * @param PhysicalAddress|null $value Value to set for the businessAddress property.
    */
    public function setBusinessAddress(?PhysicalAddress $value): void {
        $this->businessAddress = $value;
    }

    /**
     * Sets the businessHomePage property value. The business home page of the contact.
     * @param string|null $value Value to set for the businessHomePage property.
    */
    public function setBusinessHomePage(?string $value): void {
        $this->businessHomePage = $value;
    }

    /**
     * Sets the businessPhones property value. The contact's business phone numbers.
     * @param array<string>|null $value Value to set for the businessPhones property.
    */
    public function setBusinessPhones(?array $value): void {
        $this->businessPhones = $value;
    }

    /**
     * Sets the children property value. The names of the contact's children.
     * @param array<string>|null $value Value to set for the children property.
    */
    public function setChildren(?array $value): void {
        $this->children = $value;
    }

    /**
     * Sets the companyName property value. The name of the contact's company.
     * @param string|null $value Value to set for the companyName property.
    */
    public function setCompanyName(?string $value): void {
        $this->companyName = $value;
    }

    /**
     * Sets the department property value. The contact's department.
     * @param string|null $value Value to set for the department property.
    */
    public function setDepartment(?string $value): void {
        $this->department = $value;
    }

    /**
     * Sets the displayName property value. The contact's display name. You can specify the display name in a create or update operation. Note that later updates to other properties may cause an automatically generated value to overwrite the displayName value you have specified. To preserve a pre-existing value, always include it as displayName in an update operation.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the emailAddresses property value. The contact's email addresses.
     * @param array<EmailAddress>|null $value Value to set for the emailAddresses property.
    */
    public function setEmailAddresses(?array $value): void {
        $this->emailAddresses = $value;
    }

    /**
     * Sets the extensions property value. The collection of open extensions defined for the contact. Read-only. Nullable.
     * @param array<Extension>|null $value Value to set for the extensions property.
    */
    public function setExtensions(?array $value): void {
        $this->extensions = $value;
    }

    /**
     * Sets the fileAs property value. The name the contact is filed under.
     * @param string|null $value Value to set for the fileAs property.
    */
    public function setFileAs(?string $value): void {
        $this->fileAs = $value;
    }

    /**
     * Sets the generation property value. The contact's suffix.
     * @param string|null $value Value to set for the generation property.
    */
    public function setGeneration(?string $value): void {
        $this->generation = $value;
    }

    /**
     * Sets the givenName property value. The contact's given name.
     * @param string|null $value Value to set for the givenName property.
    */
    public function setGivenName(?string $value): void {
        $this->givenName = $value;
    }

    /**
     * Sets the homeAddress property value. The contact's home address.
     * @param PhysicalAddress|null $value Value to set for the homeAddress property.
    */
    public function setHomeAddress(?PhysicalAddress $value): void {
        $this->homeAddress = $value;
    }

    /**
     * Sets the homePhones property value. The contact's home phone numbers.
     * @param array<string>|null $value Value to set for the homePhones property.
    */
    public function setHomePhones(?array $value): void {
        $this->homePhones = $value;
    }

    /**
     * Sets the imAddresses property value. The contact's instant messaging (IM) addresses.
     * @param array<string>|null $value Value to set for the imAddresses property.
    */
    public function setImAddresses(?array $value): void {
        $this->imAddresses = $value;
    }

    /**
     * Sets the initials property value. The contact's initials.
     * @param string|null $value Value to set for the initials property.
    */
    public function setInitials(?string $value): void {
        $this->initials = $value;
    }

    /**
     * Sets the jobTitle property value. The contact’s job title.
     * @param string|null $value Value to set for the jobTitle property.
    */
    public function setJobTitle(?string $value): void {
        $this->jobTitle = $value;
    }

    /**
     * Sets the manager property value. The name of the contact's manager.
     * @param string|null $value Value to set for the manager property.
    */
    public function setManager(?string $value): void {
        $this->manager = $value;
    }

    /**
     * Sets the middleName property value. The contact's middle name.
     * @param string|null $value Value to set for the middleName property.
    */
    public function setMiddleName(?string $value): void {
        $this->middleName = $value;
    }

    /**
     * Sets the mobilePhone property value. The contact's mobile phone number.
     * @param string|null $value Value to set for the mobilePhone property.
    */
    public function setMobilePhone(?string $value): void {
        $this->mobilePhone = $value;
    }

    /**
     * Sets the multiValueExtendedProperties property value. The collection of multi-value extended properties defined for the contact. Read-only. Nullable.
     * @param array<MultiValueLegacyExtendedProperty>|null $value Value to set for the multiValueExtendedProperties property.
    */
    public function setMultiValueExtendedProperties(?array $value): void {
        $this->multiValueExtendedProperties = $value;
    }

    /**
     * Sets the nickName property value. The contact's nickname.
     * @param string|null $value Value to set for the nickName property.
    */
    public function setNickName(?string $value): void {
        $this->nickName = $value;
    }

    /**
     * Sets the officeLocation property value. The location of the contact's office.
     * @param string|null $value Value to set for the officeLocation property.
    */
    public function setOfficeLocation(?string $value): void {
        $this->officeLocation = $value;
    }

    /**
     * Sets the otherAddress property value. Other addresses for the contact.
     * @param PhysicalAddress|null $value Value to set for the otherAddress property.
    */
    public function setOtherAddress(?PhysicalAddress $value): void {
        $this->otherAddress = $value;
    }

    /**
     * Sets the parentFolderId property value. The ID of the contact's parent folder.
     * @param string|null $value Value to set for the parentFolderId property.
    */
    public function setParentFolderId(?string $value): void {
        $this->parentFolderId = $value;
    }

    /**
     * Sets the personalNotes property value. The user's notes about the contact.
     * @param string|null $value Value to set for the personalNotes property.
    */
    public function setPersonalNotes(?string $value): void {
        $this->personalNotes = $value;
    }

    /**
     * Sets the photo property value. Optional contact picture. You can get or set a photo for a contact.
     * @param ProfilePhoto|null $value Value to set for the photo property.
    */
    public function setPhoto(?ProfilePhoto $value): void {
        $this->photo = $value;
    }

    /**
     * Sets the primaryEmailAddress property value. The contact's primary email address.
     * @param EmailAddress|null $value Value to set for the primaryEmailAddress property.
    */
    public function setPrimaryEmailAddress(?EmailAddress $value): void {
        $this->primaryEmailAddress = $value;
    }

    /**
     * Sets the profession property value. The contact's profession.
     * @param string|null $value Value to set for the profession property.
    */
    public function setProfession(?string $value): void {
        $this->profession = $value;
    }

    /**
     * Sets the secondaryEmailAddress property value. The contact's secondary email address.
     * @param EmailAddress|null $value Value to set for the secondaryEmailAddress property.
    */
    public function setSecondaryEmailAddress(?EmailAddress $value): void {
        $this->secondaryEmailAddress = $value;
    }

    /**
     * Sets the singleValueExtendedProperties property value. The collection of single-value extended properties defined for the contact. Read-only. Nullable.
     * @param array<SingleValueLegacyExtendedProperty>|null $value Value to set for the singleValueExtendedProperties property.
    */
    public function setSingleValueExtendedProperties(?array $value): void {
        $this->singleValueExtendedProperties = $value;
    }

    /**
     * Sets the spouseName property value. The name of the contact's spouse/partner.
     * @param string|null $value Value to set for the spouseName property.
    */
    public function setSpouseName(?string $value): void {
        $this->spouseName = $value;
    }

    /**
     * Sets the surname property value. The contact's surname.
     * @param string|null $value Value to set for the surname property.
    */
    public function setSurname(?string $value): void {
        $this->surname = $value;
    }

    /**
     * Sets the tertiaryEmailAddress property value. The contact's tertiary email address.
     * @param EmailAddress|null $value Value to set for the tertiaryEmailAddress property.
    */
    public function setTertiaryEmailAddress(?EmailAddress $value): void {
        $this->tertiaryEmailAddress = $value;
    }

    /**
     * Sets the title property value. The contact's title.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

    /**
     * Sets the yomiCompanyName property value. The phonetic Japanese company name of the contact.
     * @param string|null $value Value to set for the yomiCompanyName property.
    */
    public function setYomiCompanyName(?string $value): void {
        $this->yomiCompanyName = $value;
    }

    /**
     * Sets the yomiGivenName property value. The phonetic Japanese given name (first name) of the contact.
     * @param string|null $value Value to set for the yomiGivenName property.
    */
    public function setYomiGivenName(?string $value): void {
        $this->yomiGivenName = $value;
    }

    /**
     * Sets the yomiSurname property value. The phonetic Japanese surname (last name)  of the contact.
     * @param string|null $value Value to set for the yomiSurname property.
    */
    public function setYomiSurname(?string $value): void {
        $this->yomiSurname = $value;
    }

}
