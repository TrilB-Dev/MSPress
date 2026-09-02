<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudPcProvisioningPolicyAssignment extends Entity implements Parsable 
{
    /**
     * @var array<User>|null $assignedUsers The assignment targeted users for the provisioning policy. This list of users is computed based on assignments, licenses, group memberships, and policies. Read-only. Supports$expand.
    */
    private ?array $assignedUsers = null;
    
    /**
     * @var CloudPcManagementAssignmentTarget|null $target The assignment target for the provisioning policy. Currently, the only target supported for this policy is a user group. For details, see cloudPcManagementGroupAssignmentTarget.
    */
    private ?CloudPcManagementAssignmentTarget $target = null;
    
    /**
     * Instantiates a new CloudPcProvisioningPolicyAssignment and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudPcProvisioningPolicyAssignment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudPcProvisioningPolicyAssignment {
        return new CloudPcProvisioningPolicyAssignment();
    }

    /**
     * Gets the assignedUsers property value. The assignment targeted users for the provisioning policy. This list of users is computed based on assignments, licenses, group memberships, and policies. Read-only. Supports$expand.
     * @return array<User>|null
    */
    public function getAssignedUsers(): ?array {
        return $this->assignedUsers;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'assignedUsers' => fn(ParseNode $n) => $o->setAssignedUsers($n->getCollectionOfObjectValues([User::class, 'createFromDiscriminatorValue'])),
            'target' => fn(ParseNode $n) => $o->setTarget($n->getObjectValue([CloudPcManagementAssignmentTarget::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the target property value. The assignment target for the provisioning policy. Currently, the only target supported for this policy is a user group. For details, see cloudPcManagementGroupAssignmentTarget.
     * @return CloudPcManagementAssignmentTarget|null
    */
    public function getTarget(): ?CloudPcManagementAssignmentTarget {
        return $this->target;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('assignedUsers', $this->getAssignedUsers());
        $writer->writeObjectValue('target', $this->getTarget());
    }

    /**
     * Sets the assignedUsers property value. The assignment targeted users for the provisioning policy. This list of users is computed based on assignments, licenses, group memberships, and policies. Read-only. Supports$expand.
     * @param array<User>|null $value Value to set for the assignedUsers property.
    */
    public function setAssignedUsers(?array $value): void {
        $this->assignedUsers = $value;
    }

    /**
     * Sets the target property value. The assignment target for the provisioning policy. Currently, the only target supported for this policy is a user group. For details, see cloudPcManagementGroupAssignmentTarget.
     * @param CloudPcManagementAssignmentTarget|null $value Value to set for the target property.
    */
    public function setTarget(?CloudPcManagementAssignmentTarget $value): void {
        $this->target = $value;
    }

}
