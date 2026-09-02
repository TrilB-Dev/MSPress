<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackage extends Entity implements Parsable 
{
    /**
     * @var array<AccessPackage>|null $accessPackagesIncompatibleWith The access packages that are incompatible with this package. Read-only.
    */
    private ?array $accessPackagesIncompatibleWith = null;
    
    /**
     * @var array<AccessPackageAssignmentPolicy>|null $assignmentPolicies Read-only. Nullable. Supports $expand.
    */
    private ?array $assignmentPolicies = null;
    
    /**
     * @var AccessPackageCatalog|null $catalog Required when creating the access package. Read-only. Nullable.
    */
    private ?AccessPackageCatalog $catalog = null;
    
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description The description of the access package.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Required. The display name of the access package. Supports $filter (eq, contains).
    */
    private ?string $displayName = null;
    
    /**
     * @var array<AccessPackage>|null $incompatibleAccessPackages The access packages whose assigned users are ineligible to be assigned this access package.
    */
    private ?array $incompatibleAccessPackages = null;
    
    /**
     * @var array<Group>|null $incompatibleGroups The groups whose members are ineligible to be assigned this access package.
    */
    private ?array $incompatibleGroups = null;
    
    /**
     * @var bool|null $isHidden Indicates whether the access package is hidden from the requestor.
    */
    private ?bool $isHidden = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var array<AccessPackageResourceRoleScope>|null $resourceRoleScopes The resource roles and scopes in this access package.
    */
    private ?array $resourceRoleScopes = null;
    
    /**
     * Instantiates a new AccessPackage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackage {
        return new AccessPackage();
    }

    /**
     * Gets the accessPackagesIncompatibleWith property value. The access packages that are incompatible with this package. Read-only.
     * @return array<AccessPackage>|null
    */
    public function getAccessPackagesIncompatibleWith(): ?array {
        return $this->accessPackagesIncompatibleWith;
    }

    /**
     * Gets the assignmentPolicies property value. Read-only. Nullable. Supports $expand.
     * @return array<AccessPackageAssignmentPolicy>|null
    */
    public function getAssignmentPolicies(): ?array {
        return $this->assignmentPolicies;
    }

    /**
     * Gets the catalog property value. Required when creating the access package. Read-only. Nullable.
     * @return AccessPackageCatalog|null
    */
    public function getCatalog(): ?AccessPackageCatalog {
        return $this->catalog;
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. The description of the access package.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Required. The display name of the access package. Supports $filter (eq, contains).
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
            'accessPackagesIncompatibleWith' => fn(ParseNode $n) => $o->setAccessPackagesIncompatibleWith($n->getCollectionOfObjectValues([AccessPackage::class, 'createFromDiscriminatorValue'])),
            'assignmentPolicies' => fn(ParseNode $n) => $o->setAssignmentPolicies($n->getCollectionOfObjectValues([AccessPackageAssignmentPolicy::class, 'createFromDiscriminatorValue'])),
            'catalog' => fn(ParseNode $n) => $o->setCatalog($n->getObjectValue([AccessPackageCatalog::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'incompatibleAccessPackages' => fn(ParseNode $n) => $o->setIncompatibleAccessPackages($n->getCollectionOfObjectValues([AccessPackage::class, 'createFromDiscriminatorValue'])),
            'incompatibleGroups' => fn(ParseNode $n) => $o->setIncompatibleGroups($n->getCollectionOfObjectValues([Group::class, 'createFromDiscriminatorValue'])),
            'isHidden' => fn(ParseNode $n) => $o->setIsHidden($n->getBooleanValue()),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            'resourceRoleScopes' => fn(ParseNode $n) => $o->setResourceRoleScopes($n->getCollectionOfObjectValues([AccessPackageResourceRoleScope::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the incompatibleAccessPackages property value. The access packages whose assigned users are ineligible to be assigned this access package.
     * @return array<AccessPackage>|null
    */
    public function getIncompatibleAccessPackages(): ?array {
        return $this->incompatibleAccessPackages;
    }

    /**
     * Gets the incompatibleGroups property value. The groups whose members are ineligible to be assigned this access package.
     * @return array<Group>|null
    */
    public function getIncompatibleGroups(): ?array {
        return $this->incompatibleGroups;
    }

    /**
     * Gets the isHidden property value. Indicates whether the access package is hidden from the requestor.
     * @return bool|null
    */
    public function getIsHidden(): ?bool {
        return $this->isHidden;
    }

    /**
     * Gets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the resourceRoleScopes property value. The resource roles and scopes in this access package.
     * @return array<AccessPackageResourceRoleScope>|null
    */
    public function getResourceRoleScopes(): ?array {
        return $this->resourceRoleScopes;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('accessPackagesIncompatibleWith', $this->getAccessPackagesIncompatibleWith());
        $writer->writeCollectionOfObjectValues('assignmentPolicies', $this->getAssignmentPolicies());
        $writer->writeObjectValue('catalog', $this->getCatalog());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('incompatibleAccessPackages', $this->getIncompatibleAccessPackages());
        $writer->writeCollectionOfObjectValues('incompatibleGroups', $this->getIncompatibleGroups());
        $writer->writeBooleanValue('isHidden', $this->getIsHidden());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeCollectionOfObjectValues('resourceRoleScopes', $this->getResourceRoleScopes());
    }

    /**
     * Sets the accessPackagesIncompatibleWith property value. The access packages that are incompatible with this package. Read-only.
     * @param array<AccessPackage>|null $value Value to set for the accessPackagesIncompatibleWith property.
    */
    public function setAccessPackagesIncompatibleWith(?array $value): void {
        $this->accessPackagesIncompatibleWith = $value;
    }

    /**
     * Sets the assignmentPolicies property value. Read-only. Nullable. Supports $expand.
     * @param array<AccessPackageAssignmentPolicy>|null $value Value to set for the assignmentPolicies property.
    */
    public function setAssignmentPolicies(?array $value): void {
        $this->assignmentPolicies = $value;
    }

    /**
     * Sets the catalog property value. Required when creating the access package. Read-only. Nullable.
     * @param AccessPackageCatalog|null $value Value to set for the catalog property.
    */
    public function setCatalog(?AccessPackageCatalog $value): void {
        $this->catalog = $value;
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. The description of the access package.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Required. The display name of the access package. Supports $filter (eq, contains).
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the incompatibleAccessPackages property value. The access packages whose assigned users are ineligible to be assigned this access package.
     * @param array<AccessPackage>|null $value Value to set for the incompatibleAccessPackages property.
    */
    public function setIncompatibleAccessPackages(?array $value): void {
        $this->incompatibleAccessPackages = $value;
    }

    /**
     * Sets the incompatibleGroups property value. The groups whose members are ineligible to be assigned this access package.
     * @param array<Group>|null $value Value to set for the incompatibleGroups property.
    */
    public function setIncompatibleGroups(?array $value): void {
        $this->incompatibleGroups = $value;
    }

    /**
     * Sets the isHidden property value. Indicates whether the access package is hidden from the requestor.
     * @param bool|null $value Value to set for the isHidden property.
    */
    public function setIsHidden(?bool $value): void {
        $this->isHidden = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the resourceRoleScopes property value. The resource roles and scopes in this access package.
     * @param array<AccessPackageResourceRoleScope>|null $value Value to set for the resourceRoleScopes property.
    */
    public function setResourceRoleScopes(?array $value): void {
        $this->resourceRoleScopes = $value;
    }

}
