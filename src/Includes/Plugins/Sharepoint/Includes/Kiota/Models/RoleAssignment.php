<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * The Role Assignment resource. Role assignments tie together a role definition with members and scopes. There can be one or more role assignments per role. This applies to custom and built-in roles.
*/
class RoleAssignment extends Entity implements Parsable 
{
    /**
     * @var string|null $description Indicates the description of the role assignment. For example: 'All administrators, employees and scope tags associated with the Houston office.' Max length is 1024 characters.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Indicates the display name of the role assignment. For example: 'Houston administrators and users'. Max length is 128 characters.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<string>|null $resourceScopes Indicates the list of resource scope security group Entra IDs. For example: {dec942f4-6777-4998-96b4-522e383b08e2}.
    */
    private ?array $resourceScopes = null;
    
    /**
     * @var RoleDefinition|null $roleDefinition Indicates the role definition for this role assignment.
    */
    private ?RoleDefinition $roleDefinition = null;
    
    /**
     * Instantiates a new RoleAssignment and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RoleAssignment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RoleAssignment {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.deviceAndAppManagementRoleAssignment': return new DeviceAndAppManagementRoleAssignment();
            }
        }
        return new RoleAssignment();
    }

    /**
     * Gets the description property value. Indicates the description of the role assignment. For example: 'All administrators, employees and scope tags associated with the Houston office.' Max length is 1024 characters.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Indicates the display name of the role assignment. For example: 'Houston administrators and users'. Max length is 128 characters.
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
            'resourceScopes' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setResourceScopes($val);
            },
            'roleDefinition' => fn(ParseNode $n) => $o->setRoleDefinition($n->getObjectValue([RoleDefinition::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the resourceScopes property value. Indicates the list of resource scope security group Entra IDs. For example: {dec942f4-6777-4998-96b4-522e383b08e2}.
     * @return array<string>|null
    */
    public function getResourceScopes(): ?array {
        return $this->resourceScopes;
    }

    /**
     * Gets the roleDefinition property value. Indicates the role definition for this role assignment.
     * @return RoleDefinition|null
    */
    public function getRoleDefinition(): ?RoleDefinition {
        return $this->roleDefinition;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfPrimitiveValues('resourceScopes', $this->getResourceScopes());
        $writer->writeObjectValue('roleDefinition', $this->getRoleDefinition());
    }

    /**
     * Sets the description property value. Indicates the description of the role assignment. For example: 'All administrators, employees and scope tags associated with the Houston office.' Max length is 1024 characters.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Indicates the display name of the role assignment. For example: 'Houston administrators and users'. Max length is 128 characters.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the resourceScopes property value. Indicates the list of resource scope security group Entra IDs. For example: {dec942f4-6777-4998-96b4-522e383b08e2}.
     * @param array<string>|null $value Value to set for the resourceScopes property.
    */
    public function setResourceScopes(?array $value): void {
        $this->resourceScopes = $value;
    }

    /**
     * Sets the roleDefinition property value. Indicates the role definition for this role assignment.
     * @param RoleDefinition|null $value Value to set for the roleDefinition property.
    */
    public function setRoleDefinition(?RoleDefinition $value): void {
        $this->roleDefinition = $value;
    }

}
