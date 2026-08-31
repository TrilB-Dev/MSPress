<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageResourceRole extends Entity implements Parsable 
{
    /**
     * @var string|null $description A description for the resource role.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the resource role such as the role defined by the application.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $originId The unique identifier of the resource role in the origin system. For a SharePoint Online site, the originId is the sequence number of the role in the site.
    */
    private ?string $originId = null;
    
    /**
     * @var string|null $originSystem The type of the resource in the origin system, such as SharePointOnline, AadApplication, AzureResources, or AadGroup.
    */
    private ?string $originSystem = null;
    
    /**
     * @var AccessPackageResource|null $resource The resource property
    */
    private ?AccessPackageResource $resource = null;
    
    /**
     * @var RoleType|null $type The role type for the Azure resource role. The possible values are: active, eligible, application, delegated, unknownFutureValue. The values active and eligible are only supported where originSystem is AzureResources while application and delegated aren't currently implemented.
    */
    private ?RoleType $type = null;
    
    /**
     * Instantiates a new AccessPackageResourceRole and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageResourceRole
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageResourceRole {
        return new AccessPackageResourceRole();
    }

    /**
     * Gets the description property value. A description for the resource role.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the resource role such as the role defined by the application.
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
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'originId' => fn(ParseNode $n) => $o->setOriginId($n->getStringValue()),
            'originSystem' => fn(ParseNode $n) => $o->setOriginSystem($n->getStringValue()),
            'resource' => fn(ParseNode $n) => $o->setResource($n->getObjectValue([AccessPackageResource::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(RoleType::class)),
        ]);
    }

    /**
     * Gets the originId property value. The unique identifier of the resource role in the origin system. For a SharePoint Online site, the originId is the sequence number of the role in the site.
     * @return string|null
    */
    public function getOriginId(): ?string {
        return $this->originId;
    }

    /**
     * Gets the originSystem property value. The type of the resource in the origin system, such as SharePointOnline, AadApplication, AzureResources, or AadGroup.
     * @return string|null
    */
    public function getOriginSystem(): ?string {
        return $this->originSystem;
    }

    /**
     * Gets the resource property value. The resource property
     * @return AccessPackageResource|null
    */
    public function getResource(): ?AccessPackageResource {
        return $this->resource;
    }

    /**
     * Gets the type property value. The role type for the Azure resource role. The possible values are: active, eligible, application, delegated, unknownFutureValue. The values active and eligible are only supported where originSystem is AzureResources while application and delegated aren't currently implemented.
     * @return RoleType|null
    */
    public function getType(): ?RoleType {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('originId', $this->getOriginId());
        $writer->writeStringValue('originSystem', $this->getOriginSystem());
        $writer->writeObjectValue('resource', $this->getResource());
        $writer->writeEnumValue('type', $this->getType());
    }

    /**
     * Sets the description property value. A description for the resource role.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the resource role such as the role defined by the application.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the originId property value. The unique identifier of the resource role in the origin system. For a SharePoint Online site, the originId is the sequence number of the role in the site.
     * @param string|null $value Value to set for the originId property.
    */
    public function setOriginId(?string $value): void {
        $this->originId = $value;
    }

    /**
     * Sets the originSystem property value. The type of the resource in the origin system, such as SharePointOnline, AadApplication, AzureResources, or AadGroup.
     * @param string|null $value Value to set for the originSystem property.
    */
    public function setOriginSystem(?string $value): void {
        $this->originSystem = $value;
    }

    /**
     * Sets the resource property value. The resource property
     * @param AccessPackageResource|null $value Value to set for the resource property.
    */
    public function setResource(?AccessPackageResource $value): void {
        $this->resource = $value;
    }

    /**
     * Sets the type property value. The role type for the Azure resource role. The possible values are: active, eligible, application, delegated, unknownFutureValue. The values active and eligible are only supported where originSystem is AzureResources while application and delegated aren't currently implemented.
     * @param RoleType|null $value Value to set for the type property.
    */
    public function setType(?RoleType $value): void {
        $this->type = $value;
    }

}
