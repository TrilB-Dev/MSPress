<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConditionalAccessRoot extends Entity implements Parsable 
{
    /**
     * @var array<AuthenticationContextClassReference>|null $authenticationContextClassReferences Read-only. Nullable. Returns a collection of the specified authentication context class references.
    */
    private ?array $authenticationContextClassReferences = null;
    
    /**
     * @var AuthenticationStrengthRoot|null $authenticationStrength The authenticationStrength property
    */
    private ?AuthenticationStrengthRoot $authenticationStrength = null;
    
    /**
     * @var CaPoliciesDeletableRoot|null $deletedItems The deletedItems property
    */
    private ?CaPoliciesDeletableRoot $deletedItems = null;
    
    /**
     * @var array<NamedLocation>|null $namedLocations Read-only. Nullable. Returns a collection of the specified named locations.
    */
    private ?array $namedLocations = null;
    
    /**
     * @var array<ConditionalAccessPolicy>|null $policies Read-only. Nullable. Returns a collection of the specified Conditional Access (CA) policies.
    */
    private ?array $policies = null;
    
    /**
     * @var array<ConditionalAccessTemplate>|null $templates Read-only. Nullable. Returns a collection of the specified Conditional Access templates.
    */
    private ?array $templates = null;
    
    /**
     * Instantiates a new ConditionalAccessRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConditionalAccessRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConditionalAccessRoot {
        return new ConditionalAccessRoot();
    }

    /**
     * Gets the authenticationContextClassReferences property value. Read-only. Nullable. Returns a collection of the specified authentication context class references.
     * @return array<AuthenticationContextClassReference>|null
    */
    public function getAuthenticationContextClassReferences(): ?array {
        return $this->authenticationContextClassReferences;
    }

    /**
     * Gets the authenticationStrength property value. The authenticationStrength property
     * @return AuthenticationStrengthRoot|null
    */
    public function getAuthenticationStrength(): ?AuthenticationStrengthRoot {
        return $this->authenticationStrength;
    }

    /**
     * Gets the deletedItems property value. The deletedItems property
     * @return CaPoliciesDeletableRoot|null
    */
    public function getDeletedItems(): ?CaPoliciesDeletableRoot {
        return $this->deletedItems;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'authenticationContextClassReferences' => fn(ParseNode $n) => $o->setAuthenticationContextClassReferences($n->getCollectionOfObjectValues([AuthenticationContextClassReference::class, 'createFromDiscriminatorValue'])),
            'authenticationStrength' => fn(ParseNode $n) => $o->setAuthenticationStrength($n->getObjectValue([AuthenticationStrengthRoot::class, 'createFromDiscriminatorValue'])),
            'deletedItems' => fn(ParseNode $n) => $o->setDeletedItems($n->getObjectValue([CaPoliciesDeletableRoot::class, 'createFromDiscriminatorValue'])),
            'namedLocations' => fn(ParseNode $n) => $o->setNamedLocations($n->getCollectionOfObjectValues([NamedLocation::class, 'createFromDiscriminatorValue'])),
            'policies' => fn(ParseNode $n) => $o->setPolicies($n->getCollectionOfObjectValues([ConditionalAccessPolicy::class, 'createFromDiscriminatorValue'])),
            'templates' => fn(ParseNode $n) => $o->setTemplates($n->getCollectionOfObjectValues([ConditionalAccessTemplate::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the namedLocations property value. Read-only. Nullable. Returns a collection of the specified named locations.
     * @return array<NamedLocation>|null
    */
    public function getNamedLocations(): ?array {
        return $this->namedLocations;
    }

    /**
     * Gets the policies property value. Read-only. Nullable. Returns a collection of the specified Conditional Access (CA) policies.
     * @return array<ConditionalAccessPolicy>|null
    */
    public function getPolicies(): ?array {
        return $this->policies;
    }

    /**
     * Gets the templates property value. Read-only. Nullable. Returns a collection of the specified Conditional Access templates.
     * @return array<ConditionalAccessTemplate>|null
    */
    public function getTemplates(): ?array {
        return $this->templates;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('authenticationContextClassReferences', $this->getAuthenticationContextClassReferences());
        $writer->writeObjectValue('authenticationStrength', $this->getAuthenticationStrength());
        $writer->writeObjectValue('deletedItems', $this->getDeletedItems());
        $writer->writeCollectionOfObjectValues('namedLocations', $this->getNamedLocations());
        $writer->writeCollectionOfObjectValues('policies', $this->getPolicies());
        $writer->writeCollectionOfObjectValues('templates', $this->getTemplates());
    }

    /**
     * Sets the authenticationContextClassReferences property value. Read-only. Nullable. Returns a collection of the specified authentication context class references.
     * @param array<AuthenticationContextClassReference>|null $value Value to set for the authenticationContextClassReferences property.
    */
    public function setAuthenticationContextClassReferences(?array $value): void {
        $this->authenticationContextClassReferences = $value;
    }

    /**
     * Sets the authenticationStrength property value. The authenticationStrength property
     * @param AuthenticationStrengthRoot|null $value Value to set for the authenticationStrength property.
    */
    public function setAuthenticationStrength(?AuthenticationStrengthRoot $value): void {
        $this->authenticationStrength = $value;
    }

    /**
     * Sets the deletedItems property value. The deletedItems property
     * @param CaPoliciesDeletableRoot|null $value Value to set for the deletedItems property.
    */
    public function setDeletedItems(?CaPoliciesDeletableRoot $value): void {
        $this->deletedItems = $value;
    }

    /**
     * Sets the namedLocations property value. Read-only. Nullable. Returns a collection of the specified named locations.
     * @param array<NamedLocation>|null $value Value to set for the namedLocations property.
    */
    public function setNamedLocations(?array $value): void {
        $this->namedLocations = $value;
    }

    /**
     * Sets the policies property value. Read-only. Nullable. Returns a collection of the specified Conditional Access (CA) policies.
     * @param array<ConditionalAccessPolicy>|null $value Value to set for the policies property.
    */
    public function setPolicies(?array $value): void {
        $this->policies = $value;
    }

    /**
     * Sets the templates property value. Read-only. Nullable. Returns a collection of the specified Conditional Access templates.
     * @param array<ConditionalAccessTemplate>|null $value Value to set for the templates property.
    */
    public function setTemplates(?array $value): void {
        $this->templates = $value;
    }

}
