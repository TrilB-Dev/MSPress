<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UnifiedRbacResourceAction extends Entity implements Parsable 
{
    /**
     * @var string|null $actionVerb The actionVerb property
    */
    private ?string $actionVerb = null;
    
    /**
     * @var string|null $authenticationContextId The authenticationContextId property
    */
    private ?string $authenticationContextId = null;
    
    /**
     * @var string|null $description The description property
    */
    private ?string $description = null;
    
    /**
     * @var bool|null $isAuthenticationContextSettable The isAuthenticationContextSettable property
    */
    private ?bool $isAuthenticationContextSettable = null;
    
    /**
     * @var string|null $name The name property
    */
    private ?string $name = null;
    
    /**
     * @var string|null $resourceScopeId The resourceScopeId property
    */
    private ?string $resourceScopeId = null;
    
    /**
     * Instantiates a new UnifiedRbacResourceAction and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UnifiedRbacResourceAction
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UnifiedRbacResourceAction {
        return new UnifiedRbacResourceAction();
    }

    /**
     * Gets the actionVerb property value. The actionVerb property
     * @return string|null
    */
    public function getActionVerb(): ?string {
        return $this->actionVerb;
    }

    /**
     * Gets the authenticationContextId property value. The authenticationContextId property
     * @return string|null
    */
    public function getAuthenticationContextId(): ?string {
        return $this->authenticationContextId;
    }

    /**
     * Gets the description property value. The description property
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'actionVerb' => fn(ParseNode $n) => $o->setActionVerb($n->getStringValue()),
            'authenticationContextId' => fn(ParseNode $n) => $o->setAuthenticationContextId($n->getStringValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'isAuthenticationContextSettable' => fn(ParseNode $n) => $o->setIsAuthenticationContextSettable($n->getBooleanValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'resourceScopeId' => fn(ParseNode $n) => $o->setResourceScopeId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isAuthenticationContextSettable property value. The isAuthenticationContextSettable property
     * @return bool|null
    */
    public function getIsAuthenticationContextSettable(): ?bool {
        return $this->isAuthenticationContextSettable;
    }

    /**
     * Gets the name property value. The name property
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the resourceScopeId property value. The resourceScopeId property
     * @return string|null
    */
    public function getResourceScopeId(): ?string {
        return $this->resourceScopeId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('actionVerb', $this->getActionVerb());
        $writer->writeStringValue('authenticationContextId', $this->getAuthenticationContextId());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeBooleanValue('isAuthenticationContextSettable', $this->getIsAuthenticationContextSettable());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('resourceScopeId', $this->getResourceScopeId());
    }

    /**
     * Sets the actionVerb property value. The actionVerb property
     * @param string|null $value Value to set for the actionVerb property.
    */
    public function setActionVerb(?string $value): void {
        $this->actionVerb = $value;
    }

    /**
     * Sets the authenticationContextId property value. The authenticationContextId property
     * @param string|null $value Value to set for the authenticationContextId property.
    */
    public function setAuthenticationContextId(?string $value): void {
        $this->authenticationContextId = $value;
    }

    /**
     * Sets the description property value. The description property
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the isAuthenticationContextSettable property value. The isAuthenticationContextSettable property
     * @param bool|null $value Value to set for the isAuthenticationContextSettable property.
    */
    public function setIsAuthenticationContextSettable(?bool $value): void {
        $this->isAuthenticationContextSettable = $value;
    }

    /**
     * Sets the name property value. The name property
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the resourceScopeId property value. The resourceScopeId property
     * @param string|null $value Value to set for the resourceScopeId property.
    */
    public function setResourceScopeId(?string $value): void {
        $this->resourceScopeId = $value;
    }

}
