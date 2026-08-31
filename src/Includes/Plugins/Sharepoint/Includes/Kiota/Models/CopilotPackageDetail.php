<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class CopilotPackageDetail extends CopilotPackage implements Parsable 
{
    /**
     * @var array<PackageAccessEntity>|null $acquireUsersAndGroups The acquireUsersAndGroups property
    */
    private ?array $acquireUsersAndGroups = null;
    
    /**
     * @var int|null $activeUsers The number of distinct users who actively used the package during the reporting period.
    */
    private ?int $activeUsers = null;
    
    /**
     * @var array<PackageAccessEntity>|null $allowedUsersAndGroups The allowedUsersAndGroups property
    */
    private ?array $allowedUsersAndGroups = null;
    
    /**
     * @var array<string>|null $categories The categories property
    */
    private ?array $categories = null;
    
    /**
     * @var array<PackageElementDetail>|null $elementDetails The elementDetails property
    */
    private ?array $elementDetails = null;
    
    /**
     * @var float|null $exceptionRate The fraction of sessions that resulted in an exception, expressed as a value between 0 and 1.
    */
    private ?float $exceptionRate = null;
    
    /**
     * @var DateTime|null $lastUsedDateTime The date and time when the package was last used, in ISO 8601 format and UTC.
    */
    private ?DateTime $lastUsedDateTime = null;
    
    /**
     * @var string|null $longDescription The longDescription property
    */
    private ?string $longDescription = null;
    
    /**
     * @var string|null $sensitivity The sensitivity property
    */
    private ?string $sensitivity = null;
    
    /**
     * @var array<PackageAccessEntity>|null $sharedWithUsersAndGroups The sharedWithUsersAndGroups property
    */
    private ?array $sharedWithUsersAndGroups = null;
    
    /**
     * @var float|null $totalRunTimeInHours Total hours worked by the agent.
    */
    private ?float $totalRunTimeInHours = null;
    
    /**
     * @var int|null $totalSessions The total number of sessions served by the package during the reporting period.
    */
    private ?int $totalSessions = null;
    
    /**
     * Instantiates a new CopilotPackageDetail and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CopilotPackageDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CopilotPackageDetail {
        return new CopilotPackageDetail();
    }

    /**
     * Gets the acquireUsersAndGroups property value. The acquireUsersAndGroups property
     * @return array<PackageAccessEntity>|null
    */
    public function getAcquireUsersAndGroups(): ?array {
        return $this->acquireUsersAndGroups;
    }

    /**
     * Gets the activeUsers property value. The number of distinct users who actively used the package during the reporting period.
     * @return int|null
    */
    public function getActiveUsers(): ?int {
        return $this->activeUsers;
    }

    /**
     * Gets the allowedUsersAndGroups property value. The allowedUsersAndGroups property
     * @return array<PackageAccessEntity>|null
    */
    public function getAllowedUsersAndGroups(): ?array {
        return $this->allowedUsersAndGroups;
    }

    /**
     * Gets the categories property value. The categories property
     * @return array<string>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the elementDetails property value. The elementDetails property
     * @return array<PackageElementDetail>|null
    */
    public function getElementDetails(): ?array {
        return $this->elementDetails;
    }

    /**
     * Gets the exceptionRate property value. The fraction of sessions that resulted in an exception, expressed as a value between 0 and 1.
     * @return float|null
    */
    public function getExceptionRate(): ?float {
        return $this->exceptionRate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'acquireUsersAndGroups' => fn(ParseNode $n) => $o->setAcquireUsersAndGroups($n->getCollectionOfObjectValues([PackageAccessEntity::class, 'createFromDiscriminatorValue'])),
            'activeUsers' => fn(ParseNode $n) => $o->setActiveUsers($n->getIntegerValue()),
            'allowedUsersAndGroups' => fn(ParseNode $n) => $o->setAllowedUsersAndGroups($n->getCollectionOfObjectValues([PackageAccessEntity::class, 'createFromDiscriminatorValue'])),
            'categories' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setCategories($val);
            },
            'elementDetails' => fn(ParseNode $n) => $o->setElementDetails($n->getCollectionOfObjectValues([PackageElementDetail::class, 'createFromDiscriminatorValue'])),
            'exceptionRate' => fn(ParseNode $n) => $o->setExceptionRate($n->getFloatValue()),
            'lastUsedDateTime' => fn(ParseNode $n) => $o->setLastUsedDateTime($n->getDateTimeValue()),
            'longDescription' => fn(ParseNode $n) => $o->setLongDescription($n->getStringValue()),
            'sensitivity' => fn(ParseNode $n) => $o->setSensitivity($n->getStringValue()),
            'sharedWithUsersAndGroups' => fn(ParseNode $n) => $o->setSharedWithUsersAndGroups($n->getCollectionOfObjectValues([PackageAccessEntity::class, 'createFromDiscriminatorValue'])),
            'totalRunTimeInHours' => fn(ParseNode $n) => $o->setTotalRunTimeInHours($n->getFloatValue()),
            'totalSessions' => fn(ParseNode $n) => $o->setTotalSessions($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the lastUsedDateTime property value. The date and time when the package was last used, in ISO 8601 format and UTC.
     * @return DateTime|null
    */
    public function getLastUsedDateTime(): ?DateTime {
        return $this->lastUsedDateTime;
    }

    /**
     * Gets the longDescription property value. The longDescription property
     * @return string|null
    */
    public function getLongDescription(): ?string {
        return $this->longDescription;
    }

    /**
     * Gets the sensitivity property value. The sensitivity property
     * @return string|null
    */
    public function getSensitivity(): ?string {
        return $this->sensitivity;
    }

    /**
     * Gets the sharedWithUsersAndGroups property value. The sharedWithUsersAndGroups property
     * @return array<PackageAccessEntity>|null
    */
    public function getSharedWithUsersAndGroups(): ?array {
        return $this->sharedWithUsersAndGroups;
    }

    /**
     * Gets the totalRunTimeInHours property value. Total hours worked by the agent.
     * @return float|null
    */
    public function getTotalRunTimeInHours(): ?float {
        return $this->totalRunTimeInHours;
    }

    /**
     * Gets the totalSessions property value. The total number of sessions served by the package during the reporting period.
     * @return int|null
    */
    public function getTotalSessions(): ?int {
        return $this->totalSessions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('acquireUsersAndGroups', $this->getAcquireUsersAndGroups());
        $writer->writeIntegerValue('activeUsers', $this->getActiveUsers());
        $writer->writeCollectionOfObjectValues('allowedUsersAndGroups', $this->getAllowedUsersAndGroups());
        $writer->writeCollectionOfPrimitiveValues('categories', $this->getCategories());
        $writer->writeCollectionOfObjectValues('elementDetails', $this->getElementDetails());
        $writer->writeFloatValue('exceptionRate', $this->getExceptionRate());
        $writer->writeDateTimeValue('lastUsedDateTime', $this->getLastUsedDateTime());
        $writer->writeStringValue('longDescription', $this->getLongDescription());
        $writer->writeStringValue('sensitivity', $this->getSensitivity());
        $writer->writeCollectionOfObjectValues('sharedWithUsersAndGroups', $this->getSharedWithUsersAndGroups());
        $writer->writeFloatValue('totalRunTimeInHours', $this->getTotalRunTimeInHours());
        $writer->writeIntegerValue('totalSessions', $this->getTotalSessions());
    }

    /**
     * Sets the acquireUsersAndGroups property value. The acquireUsersAndGroups property
     * @param array<PackageAccessEntity>|null $value Value to set for the acquireUsersAndGroups property.
    */
    public function setAcquireUsersAndGroups(?array $value): void {
        $this->acquireUsersAndGroups = $value;
    }

    /**
     * Sets the activeUsers property value. The number of distinct users who actively used the package during the reporting period.
     * @param int|null $value Value to set for the activeUsers property.
    */
    public function setActiveUsers(?int $value): void {
        $this->activeUsers = $value;
    }

    /**
     * Sets the allowedUsersAndGroups property value. The allowedUsersAndGroups property
     * @param array<PackageAccessEntity>|null $value Value to set for the allowedUsersAndGroups property.
    */
    public function setAllowedUsersAndGroups(?array $value): void {
        $this->allowedUsersAndGroups = $value;
    }

    /**
     * Sets the categories property value. The categories property
     * @param array<string>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the elementDetails property value. The elementDetails property
     * @param array<PackageElementDetail>|null $value Value to set for the elementDetails property.
    */
    public function setElementDetails(?array $value): void {
        $this->elementDetails = $value;
    }

    /**
     * Sets the exceptionRate property value. The fraction of sessions that resulted in an exception, expressed as a value between 0 and 1.
     * @param float|null $value Value to set for the exceptionRate property.
    */
    public function setExceptionRate(?float $value): void {
        $this->exceptionRate = $value;
    }

    /**
     * Sets the lastUsedDateTime property value. The date and time when the package was last used, in ISO 8601 format and UTC.
     * @param DateTime|null $value Value to set for the lastUsedDateTime property.
    */
    public function setLastUsedDateTime(?DateTime $value): void {
        $this->lastUsedDateTime = $value;
    }

    /**
     * Sets the longDescription property value. The longDescription property
     * @param string|null $value Value to set for the longDescription property.
    */
    public function setLongDescription(?string $value): void {
        $this->longDescription = $value;
    }

    /**
     * Sets the sensitivity property value. The sensitivity property
     * @param string|null $value Value to set for the sensitivity property.
    */
    public function setSensitivity(?string $value): void {
        $this->sensitivity = $value;
    }

    /**
     * Sets the sharedWithUsersAndGroups property value. The sharedWithUsersAndGroups property
     * @param array<PackageAccessEntity>|null $value Value to set for the sharedWithUsersAndGroups property.
    */
    public function setSharedWithUsersAndGroups(?array $value): void {
        $this->sharedWithUsersAndGroups = $value;
    }

    /**
     * Sets the totalRunTimeInHours property value. Total hours worked by the agent.
     * @param float|null $value Value to set for the totalRunTimeInHours property.
    */
    public function setTotalRunTimeInHours(?float $value): void {
        $this->totalRunTimeInHours = $value;
    }

    /**
     * Sets the totalSessions property value. The total number of sessions served by the package during the reporting period.
     * @param int|null $value Value to set for the totalSessions property.
    */
    public function setTotalSessions(?int $value): void {
        $this->totalSessions = $value;
    }

}
