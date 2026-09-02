<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageCatalog extends Entity implements Parsable 
{
    /**
     * @var array<AccessPackage>|null $accessPackages The access packages in this catalog. Read-only. Nullable.
    */
    private ?array $accessPackages = null;
    
    /**
     * @var AccessPackageCatalogType|null $catalogType Whether the catalog is created by a user or entitlement management. The possible values are: userManaged, serviceDefault, serviceManaged, unknownFutureValue.
    */
    private ?AccessPackageCatalogType $catalogType = null;
    
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<CustomCalloutExtension>|null $customWorkflowExtensions The customWorkflowExtensions property
    */
    private ?array $customWorkflowExtensions = null;
    
    /**
     * @var string|null $description The description of the access package catalog.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the access package catalog.
    */
    private ?string $displayName = null;
    
    /**
     * @var bool|null $isExternallyVisible Whether the access packages in this catalog can be requested by users outside of the tenant.
    */
    private ?bool $isExternallyVisible = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var array<AccessPackageResourceRole>|null $resourceRoles The resourceRoles property
    */
    private ?array $resourceRoles = null;
    
    /**
     * @var array<AccessPackageResource>|null $resources Access package resources in this catalog.
    */
    private ?array $resources = null;
    
    /**
     * @var array<AccessPackageResourceScope>|null $resourceScopes The resourceScopes property
    */
    private ?array $resourceScopes = null;
    
    /**
     * @var AccessPackageCatalogState|null $state Has the value published if the access packages are available for management. The possible values are: unpublished, published, unknownFutureValue.
    */
    private ?AccessPackageCatalogState $state = null;
    
    /**
     * Instantiates a new AccessPackageCatalog and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageCatalog
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageCatalog {
        return new AccessPackageCatalog();
    }

    /**
     * Gets the accessPackages property value. The access packages in this catalog. Read-only. Nullable.
     * @return array<AccessPackage>|null
    */
    public function getAccessPackages(): ?array {
        return $this->accessPackages;
    }

    /**
     * Gets the catalogType property value. Whether the catalog is created by a user or entitlement management. The possible values are: userManaged, serviceDefault, serviceManaged, unknownFutureValue.
     * @return AccessPackageCatalogType|null
    */
    public function getCatalogType(): ?AccessPackageCatalogType {
        return $this->catalogType;
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the customWorkflowExtensions property value. The customWorkflowExtensions property
     * @return array<CustomCalloutExtension>|null
    */
    public function getCustomWorkflowExtensions(): ?array {
        return $this->customWorkflowExtensions;
    }

    /**
     * Gets the description property value. The description of the access package catalog.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the access package catalog.
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
            'accessPackages' => fn(ParseNode $n) => $o->setAccessPackages($n->getCollectionOfObjectValues([AccessPackage::class, 'createFromDiscriminatorValue'])),
            'catalogType' => fn(ParseNode $n) => $o->setCatalogType($n->getEnumValue(AccessPackageCatalogType::class)),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'customWorkflowExtensions' => fn(ParseNode $n) => $o->setCustomWorkflowExtensions($n->getCollectionOfObjectValues([CustomCalloutExtension::class, 'createFromDiscriminatorValue'])),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'isExternallyVisible' => fn(ParseNode $n) => $o->setIsExternallyVisible($n->getBooleanValue()),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            'resourceRoles' => fn(ParseNode $n) => $o->setResourceRoles($n->getCollectionOfObjectValues([AccessPackageResourceRole::class, 'createFromDiscriminatorValue'])),
            'resources' => fn(ParseNode $n) => $o->setResources($n->getCollectionOfObjectValues([AccessPackageResource::class, 'createFromDiscriminatorValue'])),
            'resourceScopes' => fn(ParseNode $n) => $o->setResourceScopes($n->getCollectionOfObjectValues([AccessPackageResourceScope::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(AccessPackageCatalogState::class)),
        ]);
    }

    /**
     * Gets the isExternallyVisible property value. Whether the access packages in this catalog can be requested by users outside of the tenant.
     * @return bool|null
    */
    public function getIsExternallyVisible(): ?bool {
        return $this->isExternallyVisible;
    }

    /**
     * Gets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the resourceRoles property value. The resourceRoles property
     * @return array<AccessPackageResourceRole>|null
    */
    public function getResourceRoles(): ?array {
        return $this->resourceRoles;
    }

    /**
     * Gets the resources property value. Access package resources in this catalog.
     * @return array<AccessPackageResource>|null
    */
    public function getResources(): ?array {
        return $this->resources;
    }

    /**
     * Gets the resourceScopes property value. The resourceScopes property
     * @return array<AccessPackageResourceScope>|null
    */
    public function getResourceScopes(): ?array {
        return $this->resourceScopes;
    }

    /**
     * Gets the state property value. Has the value published if the access packages are available for management. The possible values are: unpublished, published, unknownFutureValue.
     * @return AccessPackageCatalogState|null
    */
    public function getState(): ?AccessPackageCatalogState {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('accessPackages', $this->getAccessPackages());
        $writer->writeEnumValue('catalogType', $this->getCatalogType());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('customWorkflowExtensions', $this->getCustomWorkflowExtensions());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeBooleanValue('isExternallyVisible', $this->getIsExternallyVisible());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeCollectionOfObjectValues('resourceRoles', $this->getResourceRoles());
        $writer->writeCollectionOfObjectValues('resources', $this->getResources());
        $writer->writeCollectionOfObjectValues('resourceScopes', $this->getResourceScopes());
        $writer->writeEnumValue('state', $this->getState());
    }

    /**
     * Sets the accessPackages property value. The access packages in this catalog. Read-only. Nullable.
     * @param array<AccessPackage>|null $value Value to set for the accessPackages property.
    */
    public function setAccessPackages(?array $value): void {
        $this->accessPackages = $value;
    }

    /**
     * Sets the catalogType property value. Whether the catalog is created by a user or entitlement management. The possible values are: userManaged, serviceDefault, serviceManaged, unknownFutureValue.
     * @param AccessPackageCatalogType|null $value Value to set for the catalogType property.
    */
    public function setCatalogType(?AccessPackageCatalogType $value): void {
        $this->catalogType = $value;
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the customWorkflowExtensions property value. The customWorkflowExtensions property
     * @param array<CustomCalloutExtension>|null $value Value to set for the customWorkflowExtensions property.
    */
    public function setCustomWorkflowExtensions(?array $value): void {
        $this->customWorkflowExtensions = $value;
    }

    /**
     * Sets the description property value. The description of the access package catalog.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the access package catalog.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the isExternallyVisible property value. Whether the access packages in this catalog can be requested by users outside of the tenant.
     * @param bool|null $value Value to set for the isExternallyVisible property.
    */
    public function setIsExternallyVisible(?bool $value): void {
        $this->isExternallyVisible = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the resourceRoles property value. The resourceRoles property
     * @param array<AccessPackageResourceRole>|null $value Value to set for the resourceRoles property.
    */
    public function setResourceRoles(?array $value): void {
        $this->resourceRoles = $value;
    }

    /**
     * Sets the resources property value. Access package resources in this catalog.
     * @param array<AccessPackageResource>|null $value Value to set for the resources property.
    */
    public function setResources(?array $value): void {
        $this->resources = $value;
    }

    /**
     * Sets the resourceScopes property value. The resourceScopes property
     * @param array<AccessPackageResourceScope>|null $value Value to set for the resourceScopes property.
    */
    public function setResourceScopes(?array $value): void {
        $this->resourceScopes = $value;
    }

    /**
     * Sets the state property value. Has the value published if the access packages are available for management. The possible values are: unpublished, published, unknownFutureValue.
     * @param AccessPackageCatalogState|null $value Value to set for the state property.
    */
    public function setState(?AccessPackageCatalogState $value): void {
        $this->state = $value;
    }

}
