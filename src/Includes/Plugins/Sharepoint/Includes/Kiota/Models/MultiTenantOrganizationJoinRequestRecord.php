<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MultiTenantOrganizationJoinRequestRecord extends Entity implements Parsable 
{
    /**
     * @var string|null $addedByTenantId Tenant ID of the Microsoft Entra tenant that added a tenant to the multitenant organization. To reset a failed join request, set addedByTenantId to 00000000-0000-0000-0000-000000000000. Required.
    */
    private ?string $addedByTenantId = null;
    
    /**
     * @var MultiTenantOrganizationMemberState|null $memberState State of the tenant in the multitenant organization. The possible values are: pending, active, removed, unknownFutureValue. Tenants in the pending state must join the multitenant organization to participate in the multitenant organization. Tenants in the active state can participate in the multitenant organization. Tenants in the removed state are in the process of being removed from the multitenant organization. Read-only.
    */
    private ?MultiTenantOrganizationMemberState $memberState = null;
    
    /**
     * @var MultiTenantOrganizationMemberRole|null $role Role of the tenant in the multitenant organization. The possible values are: owner, member (default), unknownFutureValue. Tenants with the owner role can manage the multitenant organization. There can be multiple tenants with the owner role in a multitenant organization. Tenants with the member role can participate in a multitenant organization.
    */
    private ?MultiTenantOrganizationMemberRole $role = null;
    
    /**
     * @var MultiTenantOrganizationJoinRequestTransitionDetails|null $transitionDetails Details of the processing status for a tenant joining a multitenant organization. Read-only.
    */
    private ?MultiTenantOrganizationJoinRequestTransitionDetails $transitionDetails = null;
    
    /**
     * Instantiates a new MultiTenantOrganizationJoinRequestRecord and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MultiTenantOrganizationJoinRequestRecord
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MultiTenantOrganizationJoinRequestRecord {
        return new MultiTenantOrganizationJoinRequestRecord();
    }

    /**
     * Gets the addedByTenantId property value. Tenant ID of the Microsoft Entra tenant that added a tenant to the multitenant organization. To reset a failed join request, set addedByTenantId to 00000000-0000-0000-0000-000000000000. Required.
     * @return string|null
    */
    public function getAddedByTenantId(): ?string {
        return $this->addedByTenantId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'addedByTenantId' => fn(ParseNode $n) => $o->setAddedByTenantId($n->getStringValue()),
            'memberState' => fn(ParseNode $n) => $o->setMemberState($n->getEnumValue(MultiTenantOrganizationMemberState::class)),
            'role' => fn(ParseNode $n) => $o->setRole($n->getEnumValue(MultiTenantOrganizationMemberRole::class)),
            'transitionDetails' => fn(ParseNode $n) => $o->setTransitionDetails($n->getObjectValue([MultiTenantOrganizationJoinRequestTransitionDetails::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the memberState property value. State of the tenant in the multitenant organization. The possible values are: pending, active, removed, unknownFutureValue. Tenants in the pending state must join the multitenant organization to participate in the multitenant organization. Tenants in the active state can participate in the multitenant organization. Tenants in the removed state are in the process of being removed from the multitenant organization. Read-only.
     * @return MultiTenantOrganizationMemberState|null
    */
    public function getMemberState(): ?MultiTenantOrganizationMemberState {
        return $this->memberState;
    }

    /**
     * Gets the role property value. Role of the tenant in the multitenant organization. The possible values are: owner, member (default), unknownFutureValue. Tenants with the owner role can manage the multitenant organization. There can be multiple tenants with the owner role in a multitenant organization. Tenants with the member role can participate in a multitenant organization.
     * @return MultiTenantOrganizationMemberRole|null
    */
    public function getRole(): ?MultiTenantOrganizationMemberRole {
        return $this->role;
    }

    /**
     * Gets the transitionDetails property value. Details of the processing status for a tenant joining a multitenant organization. Read-only.
     * @return MultiTenantOrganizationJoinRequestTransitionDetails|null
    */
    public function getTransitionDetails(): ?MultiTenantOrganizationJoinRequestTransitionDetails {
        return $this->transitionDetails;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('addedByTenantId', $this->getAddedByTenantId());
        $writer->writeEnumValue('memberState', $this->getMemberState());
        $writer->writeEnumValue('role', $this->getRole());
        $writer->writeObjectValue('transitionDetails', $this->getTransitionDetails());
    }

    /**
     * Sets the addedByTenantId property value. Tenant ID of the Microsoft Entra tenant that added a tenant to the multitenant organization. To reset a failed join request, set addedByTenantId to 00000000-0000-0000-0000-000000000000. Required.
     * @param string|null $value Value to set for the addedByTenantId property.
    */
    public function setAddedByTenantId(?string $value): void {
        $this->addedByTenantId = $value;
    }

    /**
     * Sets the memberState property value. State of the tenant in the multitenant organization. The possible values are: pending, active, removed, unknownFutureValue. Tenants in the pending state must join the multitenant organization to participate in the multitenant organization. Tenants in the active state can participate in the multitenant organization. Tenants in the removed state are in the process of being removed from the multitenant organization. Read-only.
     * @param MultiTenantOrganizationMemberState|null $value Value to set for the memberState property.
    */
    public function setMemberState(?MultiTenantOrganizationMemberState $value): void {
        $this->memberState = $value;
    }

    /**
     * Sets the role property value. Role of the tenant in the multitenant organization. The possible values are: owner, member (default), unknownFutureValue. Tenants with the owner role can manage the multitenant organization. There can be multiple tenants with the owner role in a multitenant organization. Tenants with the member role can participate in a multitenant organization.
     * @param MultiTenantOrganizationMemberRole|null $value Value to set for the role property.
    */
    public function setRole(?MultiTenantOrganizationMemberRole $value): void {
        $this->role = $value;
    }

    /**
     * Sets the transitionDetails property value. Details of the processing status for a tenant joining a multitenant organization. Read-only.
     * @param MultiTenantOrganizationJoinRequestTransitionDetails|null $value Value to set for the transitionDetails property.
    */
    public function setTransitionDetails(?MultiTenantOrganizationJoinRequestTransitionDetails $value): void {
        $this->transitionDetails = $value;
    }

}
