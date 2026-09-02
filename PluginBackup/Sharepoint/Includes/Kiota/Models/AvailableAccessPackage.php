<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AvailableAccessPackage extends Entity implements Parsable 
{
    /**
     * @var string|null $description The description of the access package.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the access package.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<AccessPackageResourceRoleScope>|null $resourceRoleScopes The resource role scopes associated with this available access package.
    */
    private ?array $resourceRoleScopes = null;
    
    /**
     * Instantiates a new AvailableAccessPackage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AvailableAccessPackage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AvailableAccessPackage {
        return new AvailableAccessPackage();
    }

    /**
     * Gets the description property value. The description of the access package.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the access package.
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
            'resourceRoleScopes' => fn(ParseNode $n) => $o->setResourceRoleScopes($n->getCollectionOfObjectValues([AccessPackageResourceRoleScope::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the resourceRoleScopes property value. The resource role scopes associated with this available access package.
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
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('resourceRoleScopes', $this->getResourceRoleScopes());
    }

    /**
     * Sets the description property value. The description of the access package.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the access package.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the resourceRoleScopes property value. The resource role scopes associated with this available access package.
     * @param array<AccessPackageResourceRoleScope>|null $value Value to set for the resourceRoleScopes property.
    */
    public function setResourceRoleScopes(?array $value): void {
        $this->resourceRoleScopes = $value;
    }

}
