<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageResourceScope extends Entity implements Parsable 
{
    /**
     * @var string|null $description The description of the scope.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the scope.
    */
    private ?string $displayName = null;
    
    /**
     * @var bool|null $isRootScope True if the scopes are arranged in a hierarchy and this is the top or root scope of the resource.
    */
    private ?bool $isRootScope = null;
    
    /**
     * @var string|null $originId The unique identifier of the resource in the origin system. If a Microsoft Entra group, originId is the identifier of the group. Supports $filter (eq).
    */
    private ?string $originId = null;
    
    /**
     * @var string|null $originSystem The type of the resource in the origin system, such as SharePointOnline, AadApplication, AadGroup, AzureResources, or CustomDataProvidedResource. Supports $filter (eq).
    */
    private ?string $originSystem = null;
    
    /**
     * @var AccessPackageResource|null $resource The resource property
    */
    private ?AccessPackageResource $resource = null;
    
    /**
     * Instantiates a new AccessPackageResourceScope and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageResourceScope
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageResourceScope {
        return new AccessPackageResourceScope();
    }

    /**
     * Gets the description property value. The description of the scope.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the scope.
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
            'isRootScope' => fn(ParseNode $n) => $o->setIsRootScope($n->getBooleanValue()),
            'originId' => fn(ParseNode $n) => $o->setOriginId($n->getStringValue()),
            'originSystem' => fn(ParseNode $n) => $o->setOriginSystem($n->getStringValue()),
            'resource' => fn(ParseNode $n) => $o->setResource($n->getObjectValue([AccessPackageResource::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isRootScope property value. True if the scopes are arranged in a hierarchy and this is the top or root scope of the resource.
     * @return bool|null
    */
    public function getIsRootScope(): ?bool {
        return $this->isRootScope;
    }

    /**
     * Gets the originId property value. The unique identifier of the resource in the origin system. If a Microsoft Entra group, originId is the identifier of the group. Supports $filter (eq).
     * @return string|null
    */
    public function getOriginId(): ?string {
        return $this->originId;
    }

    /**
     * Gets the originSystem property value. The type of the resource in the origin system, such as SharePointOnline, AadApplication, AadGroup, AzureResources, or CustomDataProvidedResource. Supports $filter (eq).
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeBooleanValue('isRootScope', $this->getIsRootScope());
        $writer->writeStringValue('originId', $this->getOriginId());
        $writer->writeStringValue('originSystem', $this->getOriginSystem());
        $writer->writeObjectValue('resource', $this->getResource());
    }

    /**
     * Sets the description property value. The description of the scope.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the scope.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the isRootScope property value. True if the scopes are arranged in a hierarchy and this is the top or root scope of the resource.
     * @param bool|null $value Value to set for the isRootScope property.
    */
    public function setIsRootScope(?bool $value): void {
        $this->isRootScope = $value;
    }

    /**
     * Sets the originId property value. The unique identifier of the resource in the origin system. If a Microsoft Entra group, originId is the identifier of the group. Supports $filter (eq).
     * @param string|null $value Value to set for the originId property.
    */
    public function setOriginId(?string $value): void {
        $this->originId = $value;
    }

    /**
     * Sets the originSystem property value. The type of the resource in the origin system, such as SharePointOnline, AadApplication, AadGroup, AzureResources, or CustomDataProvidedResource. Supports $filter (eq).
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

}
