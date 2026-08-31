<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationModule extends Entity implements Parsable 
{
    /**
     * @var IdentitySet|null $createdBy The display name of the user that created the module.
    */
    private ?IdentitySet $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime Date time the module was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description Description of the module.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Name of the module.
    */
    private ?string $displayName = null;
    
    /**
     * @var bool|null $isPinned Indicates whether the module is pinned or not.
    */
    private ?bool $isPinned = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy The last user that modified the module.
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime Date time the module was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var array<EducationModuleResource>|null $resources Learning objects that are associated with this module. Only teachers can modify this list. Nullable.
    */
    private ?array $resources = null;
    
    /**
     * @var string|null $resourcesFolderUrl Folder URL where all the file resources for this module are stored.
    */
    private ?string $resourcesFolderUrl = null;
    
    /**
     * @var EducationModuleStatus|null $status Status of the module. You can't use a PATCH operation to update this value. The possible values are: draft and published.
    */
    private ?EducationModuleStatus $status = null;
    
    /**
     * Instantiates a new EducationModule and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationModule
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationModule {
        return new EducationModule();
    }

    /**
     * Gets the createdBy property value. The display name of the user that created the module.
     * @return IdentitySet|null
    */
    public function getCreatedBy(): ?IdentitySet {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. Date time the module was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. Description of the module.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Name of the module.
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
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'isPinned' => fn(ParseNode $n) => $o->setIsPinned($n->getBooleanValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'resources' => fn(ParseNode $n) => $o->setResources($n->getCollectionOfObjectValues([EducationModuleResource::class, 'createFromDiscriminatorValue'])),
            'resourcesFolderUrl' => fn(ParseNode $n) => $o->setResourcesFolderUrl($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(EducationModuleStatus::class)),
        ]);
    }

    /**
     * Gets the isPinned property value. Indicates whether the module is pinned or not.
     * @return bool|null
    */
    public function getIsPinned(): ?bool {
        return $this->isPinned;
    }

    /**
     * Gets the lastModifiedBy property value. The last user that modified the module.
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. Date time the module was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the resources property value. Learning objects that are associated with this module. Only teachers can modify this list. Nullable.
     * @return array<EducationModuleResource>|null
    */
    public function getResources(): ?array {
        return $this->resources;
    }

    /**
     * Gets the resourcesFolderUrl property value. Folder URL where all the file resources for this module are stored.
     * @return string|null
    */
    public function getResourcesFolderUrl(): ?string {
        return $this->resourcesFolderUrl;
    }

    /**
     * Gets the status property value. Status of the module. You can't use a PATCH operation to update this value. The possible values are: draft and published.
     * @return EducationModuleStatus|null
    */
    public function getStatus(): ?EducationModuleStatus {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeBooleanValue('isPinned', $this->getIsPinned());
        $writer->writeCollectionOfObjectValues('resources', $this->getResources());
    }

    /**
     * Sets the createdBy property value. The display name of the user that created the module.
     * @param IdentitySet|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?IdentitySet $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. Date time the module was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. Description of the module.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Name of the module.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the isPinned property value. Indicates whether the module is pinned or not.
     * @param bool|null $value Value to set for the isPinned property.
    */
    public function setIsPinned(?bool $value): void {
        $this->isPinned = $value;
    }

    /**
     * Sets the lastModifiedBy property value. The last user that modified the module.
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. Date time the module was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the resources property value. Learning objects that are associated with this module. Only teachers can modify this list. Nullable.
     * @param array<EducationModuleResource>|null $value Value to set for the resources property.
    */
    public function setResources(?array $value): void {
        $this->resources = $value;
    }

    /**
     * Sets the resourcesFolderUrl property value. Folder URL where all the file resources for this module are stored.
     * @param string|null $value Value to set for the resourcesFolderUrl property.
    */
    public function setResourcesFolderUrl(?string $value): void {
        $this->resourcesFolderUrl = $value;
    }

    /**
     * Sets the status property value. Status of the module. You can't use a PATCH operation to update this value. The possible values are: draft and published.
     * @param EducationModuleStatus|null $value Value to set for the status property.
    */
    public function setStatus(?EducationModuleStatus $value): void {
        $this->status = $value;
    }

}
