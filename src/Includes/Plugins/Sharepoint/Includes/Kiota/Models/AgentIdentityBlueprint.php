<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AgentIdentityBlueprint extends Application implements Parsable 
{
    /**
     * @var array<InheritablePermission>|null $inheritablePermissions Defines scopes of a resource application that may be automatically granted to agent identities without additional consent.
    */
    private ?array $inheritablePermissions = null;
    
    /**
     * @var array<DirectoryObject>|null $sponsors The sponsors for this agent identity blueprint. Sponsors are users or groups who can authorize and manage the lifecycle of agent identity instances. Required during the create operation.
    */
    private ?array $sponsors = null;
    
    /**
     * Instantiates a new AgentIdentityBlueprint and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.agentIdentityBlueprint');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AgentIdentityBlueprint
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AgentIdentityBlueprint {
        return new AgentIdentityBlueprint();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'inheritablePermissions' => fn(ParseNode $n) => $o->setInheritablePermissions($n->getCollectionOfObjectValues([InheritablePermission::class, 'createFromDiscriminatorValue'])),
            'sponsors' => fn(ParseNode $n) => $o->setSponsors($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the inheritablePermissions property value. Defines scopes of a resource application that may be automatically granted to agent identities without additional consent.
     * @return array<InheritablePermission>|null
    */
    public function getInheritablePermissions(): ?array {
        return $this->inheritablePermissions;
    }

    /**
     * Gets the sponsors property value. The sponsors for this agent identity blueprint. Sponsors are users or groups who can authorize and manage the lifecycle of agent identity instances. Required during the create operation.
     * @return array<DirectoryObject>|null
    */
    public function getSponsors(): ?array {
        return $this->sponsors;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('inheritablePermissions', $this->getInheritablePermissions());
        $writer->writeCollectionOfObjectValues('sponsors', $this->getSponsors());
    }

    /**
     * Sets the inheritablePermissions property value. Defines scopes of a resource application that may be automatically granted to agent identities without additional consent.
     * @param array<InheritablePermission>|null $value Value to set for the inheritablePermissions property.
    */
    public function setInheritablePermissions(?array $value): void {
        $this->inheritablePermissions = $value;
    }

    /**
     * Sets the sponsors property value. The sponsors for this agent identity blueprint. Sponsors are users or groups who can authorize and manage the lifecycle of agent identity instances. Required during the create operation.
     * @param array<DirectoryObject>|null $value Value to set for the sponsors property.
    */
    public function setSponsors(?array $value): void {
        $this->sponsors = $value;
    }

}
