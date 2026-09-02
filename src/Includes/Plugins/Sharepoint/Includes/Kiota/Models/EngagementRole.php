<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Represents a Viva Engage role and its members
*/
class EngagementRole extends Entity implements Parsable 
{
    /**
     * @var string|null $displayName The name of the role.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<EngagementRoleMember>|null $members Users that have this role assigned.
    */
    private ?array $members = null;
    
    /**
     * Instantiates a new EngagementRole and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EngagementRole
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EngagementRole {
        return new EngagementRole();
    }

    /**
     * Gets the displayName property value. The name of the role.
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
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'members' => fn(ParseNode $n) => $o->setMembers($n->getCollectionOfObjectValues([EngagementRoleMember::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the members property value. Users that have this role assigned.
     * @return array<EngagementRoleMember>|null
    */
    public function getMembers(): ?array {
        return $this->members;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('members', $this->getMembers());
    }

    /**
     * Sets the displayName property value. The name of the role.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the members property value. Users that have this role assigned.
     * @param array<EngagementRoleMember>|null $value Value to set for the members property.
    */
    public function setMembers(?array $value): void {
        $this->members = $value;
    }

}
