<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AdministrativeUnit extends DirectoryObject implements Parsable 
{
    /**
     * @var string|null $description An optional description for the administrative unit. Supports $filter (eq, ne, in, startsWith), $search.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Display name for the administrative unit. Maximum length is 256 characters. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values), $search, and $orderby.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<Extension>|null $extensions The collection of open extensions defined for this administrative unit. Nullable.
    */
    private ?array $extensions = null;
    
    /**
     * @var bool|null $isMemberManagementRestricted true if members of this administrative unit should be treated as sensitive, which requires specific permissions to manage. If not set, the default value is null and the default behavior is false. Use this property to define administrative units with roles that don't inherit from tenant-level administrators, and where the management of individual member objects is limited to administrators scoped to a restricted management administrative unit. This property is immutable and can't be changed later.  For more information on how to work with restricted management administrative units, see Restricted management administrative units in Microsoft Entra ID.
    */
    private ?bool $isMemberManagementRestricted = null;
    
    /**
     * @var array<DirectoryObject>|null $members Users and groups that are members of this administrative unit. Supports $expand.
    */
    private ?array $members = null;
    
    /**
     * @var string|null $membershipRule The dynamic membership rule for the administrative unit. For more information about the rules you can use for dynamic administrative units and dynamic groups, see Manage rules for dynamic membership groups in Microsoft Entra ID.
    */
    private ?string $membershipRule = null;
    
    /**
     * @var string|null $membershipRuleProcessingState Controls whether the dynamic membership rule is actively processed. Set to On to activate the dynamic membership rule, or Paused to stop updating membership dynamically.
    */
    private ?string $membershipRuleProcessingState = null;
    
    /**
     * @var string|null $membershipType Indicates the membership type for the administrative unit. The possible values are: dynamic, assigned. If not set, the default value is null and the default behavior is assigned.
    */
    private ?string $membershipType = null;
    
    /**
     * @var array<ScopedRoleMembership>|null $scopedRoleMembers Scoped-role members of this administrative unit.
    */
    private ?array $scopedRoleMembers = null;
    
    /**
     * @var string|null $visibility Controls whether the administrative unit and its members are hidden or public. Can be set to HiddenMembership. If not set, the default value is null and the default behavior is public. When set to HiddenMembership, only members of the administrative unit can list other members of the administrative unit.
    */
    private ?string $visibility = null;
    
    /**
     * Instantiates a new AdministrativeUnit and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.administrativeUnit');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AdministrativeUnit
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AdministrativeUnit {
        return new AdministrativeUnit();
    }

    /**
     * Gets the description property value. An optional description for the administrative unit. Supports $filter (eq, ne, in, startsWith), $search.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Display name for the administrative unit. Maximum length is 256 characters. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values), $search, and $orderby.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the extensions property value. The collection of open extensions defined for this administrative unit. Nullable.
     * @return array<Extension>|null
    */
    public function getExtensions(): ?array {
        return $this->extensions;
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
            'extensions' => fn(ParseNode $n) => $o->setExtensions($n->getCollectionOfObjectValues([Extension::class, 'createFromDiscriminatorValue'])),
            'isMemberManagementRestricted' => fn(ParseNode $n) => $o->setIsMemberManagementRestricted($n->getBooleanValue()),
            'members' => fn(ParseNode $n) => $o->setMembers($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'membershipRule' => fn(ParseNode $n) => $o->setMembershipRule($n->getStringValue()),
            'membershipRuleProcessingState' => fn(ParseNode $n) => $o->setMembershipRuleProcessingState($n->getStringValue()),
            'membershipType' => fn(ParseNode $n) => $o->setMembershipType($n->getStringValue()),
            'scopedRoleMembers' => fn(ParseNode $n) => $o->setScopedRoleMembers($n->getCollectionOfObjectValues([ScopedRoleMembership::class, 'createFromDiscriminatorValue'])),
            'visibility' => fn(ParseNode $n) => $o->setVisibility($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isMemberManagementRestricted property value. true if members of this administrative unit should be treated as sensitive, which requires specific permissions to manage. If not set, the default value is null and the default behavior is false. Use this property to define administrative units with roles that don't inherit from tenant-level administrators, and where the management of individual member objects is limited to administrators scoped to a restricted management administrative unit. This property is immutable and can't be changed later.  For more information on how to work with restricted management administrative units, see Restricted management administrative units in Microsoft Entra ID.
     * @return bool|null
    */
    public function getIsMemberManagementRestricted(): ?bool {
        return $this->isMemberManagementRestricted;
    }

    /**
     * Gets the members property value. Users and groups that are members of this administrative unit. Supports $expand.
     * @return array<DirectoryObject>|null
    */
    public function getMembers(): ?array {
        return $this->members;
    }

    /**
     * Gets the membershipRule property value. The dynamic membership rule for the administrative unit. For more information about the rules you can use for dynamic administrative units and dynamic groups, see Manage rules for dynamic membership groups in Microsoft Entra ID.
     * @return string|null
    */
    public function getMembershipRule(): ?string {
        return $this->membershipRule;
    }

    /**
     * Gets the membershipRuleProcessingState property value. Controls whether the dynamic membership rule is actively processed. Set to On to activate the dynamic membership rule, or Paused to stop updating membership dynamically.
     * @return string|null
    */
    public function getMembershipRuleProcessingState(): ?string {
        return $this->membershipRuleProcessingState;
    }

    /**
     * Gets the membershipType property value. Indicates the membership type for the administrative unit. The possible values are: dynamic, assigned. If not set, the default value is null and the default behavior is assigned.
     * @return string|null
    */
    public function getMembershipType(): ?string {
        return $this->membershipType;
    }

    /**
     * Gets the scopedRoleMembers property value. Scoped-role members of this administrative unit.
     * @return array<ScopedRoleMembership>|null
    */
    public function getScopedRoleMembers(): ?array {
        return $this->scopedRoleMembers;
    }

    /**
     * Gets the visibility property value. Controls whether the administrative unit and its members are hidden or public. Can be set to HiddenMembership. If not set, the default value is null and the default behavior is public. When set to HiddenMembership, only members of the administrative unit can list other members of the administrative unit.
     * @return string|null
    */
    public function getVisibility(): ?string {
        return $this->visibility;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('extensions', $this->getExtensions());
        $writer->writeBooleanValue('isMemberManagementRestricted', $this->getIsMemberManagementRestricted());
        $writer->writeCollectionOfObjectValues('members', $this->getMembers());
        $writer->writeStringValue('membershipRule', $this->getMembershipRule());
        $writer->writeStringValue('membershipRuleProcessingState', $this->getMembershipRuleProcessingState());
        $writer->writeStringValue('membershipType', $this->getMembershipType());
        $writer->writeCollectionOfObjectValues('scopedRoleMembers', $this->getScopedRoleMembers());
        $writer->writeStringValue('visibility', $this->getVisibility());
    }

    /**
     * Sets the description property value. An optional description for the administrative unit. Supports $filter (eq, ne, in, startsWith), $search.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Display name for the administrative unit. Maximum length is 256 characters. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values), $search, and $orderby.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the extensions property value. The collection of open extensions defined for this administrative unit. Nullable.
     * @param array<Extension>|null $value Value to set for the extensions property.
    */
    public function setExtensions(?array $value): void {
        $this->extensions = $value;
    }

    /**
     * Sets the isMemberManagementRestricted property value. true if members of this administrative unit should be treated as sensitive, which requires specific permissions to manage. If not set, the default value is null and the default behavior is false. Use this property to define administrative units with roles that don't inherit from tenant-level administrators, and where the management of individual member objects is limited to administrators scoped to a restricted management administrative unit. This property is immutable and can't be changed later.  For more information on how to work with restricted management administrative units, see Restricted management administrative units in Microsoft Entra ID.
     * @param bool|null $value Value to set for the isMemberManagementRestricted property.
    */
    public function setIsMemberManagementRestricted(?bool $value): void {
        $this->isMemberManagementRestricted = $value;
    }

    /**
     * Sets the members property value. Users and groups that are members of this administrative unit. Supports $expand.
     * @param array<DirectoryObject>|null $value Value to set for the members property.
    */
    public function setMembers(?array $value): void {
        $this->members = $value;
    }

    /**
     * Sets the membershipRule property value. The dynamic membership rule for the administrative unit. For more information about the rules you can use for dynamic administrative units and dynamic groups, see Manage rules for dynamic membership groups in Microsoft Entra ID.
     * @param string|null $value Value to set for the membershipRule property.
    */
    public function setMembershipRule(?string $value): void {
        $this->membershipRule = $value;
    }

    /**
     * Sets the membershipRuleProcessingState property value. Controls whether the dynamic membership rule is actively processed. Set to On to activate the dynamic membership rule, or Paused to stop updating membership dynamically.
     * @param string|null $value Value to set for the membershipRuleProcessingState property.
    */
    public function setMembershipRuleProcessingState(?string $value): void {
        $this->membershipRuleProcessingState = $value;
    }

    /**
     * Sets the membershipType property value. Indicates the membership type for the administrative unit. The possible values are: dynamic, assigned. If not set, the default value is null and the default behavior is assigned.
     * @param string|null $value Value to set for the membershipType property.
    */
    public function setMembershipType(?string $value): void {
        $this->membershipType = $value;
    }

    /**
     * Sets the scopedRoleMembers property value. Scoped-role members of this administrative unit.
     * @param array<ScopedRoleMembership>|null $value Value to set for the scopedRoleMembers property.
    */
    public function setScopedRoleMembers(?array $value): void {
        $this->scopedRoleMembers = $value;
    }

    /**
     * Sets the visibility property value. Controls whether the administrative unit and its members are hidden or public. Can be set to HiddenMembership. If not set, the default value is null and the default behavior is public. When set to HiddenMembership, only members of the administrative unit can list other members of the administrative unit.
     * @param string|null $value Value to set for the visibility property.
    */
    public function setVisibility(?string $value): void {
        $this->visibility = $value;
    }

}
