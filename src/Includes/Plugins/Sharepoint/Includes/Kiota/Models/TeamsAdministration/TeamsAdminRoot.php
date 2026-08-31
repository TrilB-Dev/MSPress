<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class TeamsAdminRoot extends Entity implements Parsable 
{
    /**
     * @var TeamsPolicyAssignment|null $policy Represents a navigation property to the Teams policy assignment object.
    */
    private ?TeamsPolicyAssignment $policy = null;
    
    /**
     * @var TelephoneNumberManagementRoot|null $telephoneNumberManagement Represents a collection of available telephone number management operations.
    */
    private ?TelephoneNumberManagementRoot $telephoneNumberManagement = null;
    
    /**
     * @var array<TeamsUserConfiguration>|null $userConfigurations Represents the configuration information of users who have accounts hosted on Microsoft Teams
    */
    private ?array $userConfigurations = null;
    
    /**
     * Instantiates a new TeamsAdminRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TeamsAdminRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TeamsAdminRoot {
        return new TeamsAdminRoot();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'policy' => fn(ParseNode $n) => $o->setPolicy($n->getObjectValue([TeamsPolicyAssignment::class, 'createFromDiscriminatorValue'])),
            'telephoneNumberManagement' => fn(ParseNode $n) => $o->setTelephoneNumberManagement($n->getObjectValue([TelephoneNumberManagementRoot::class, 'createFromDiscriminatorValue'])),
            'userConfigurations' => fn(ParseNode $n) => $o->setUserConfigurations($n->getCollectionOfObjectValues([TeamsUserConfiguration::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the policy property value. Represents a navigation property to the Teams policy assignment object.
     * @return TeamsPolicyAssignment|null
    */
    public function getPolicy(): ?TeamsPolicyAssignment {
        return $this->policy;
    }

    /**
     * Gets the telephoneNumberManagement property value. Represents a collection of available telephone number management operations.
     * @return TelephoneNumberManagementRoot|null
    */
    public function getTelephoneNumberManagement(): ?TelephoneNumberManagementRoot {
        return $this->telephoneNumberManagement;
    }

    /**
     * Gets the userConfigurations property value. Represents the configuration information of users who have accounts hosted on Microsoft Teams
     * @return array<TeamsUserConfiguration>|null
    */
    public function getUserConfigurations(): ?array {
        return $this->userConfigurations;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('policy', $this->getPolicy());
        $writer->writeObjectValue('telephoneNumberManagement', $this->getTelephoneNumberManagement());
        $writer->writeCollectionOfObjectValues('userConfigurations', $this->getUserConfigurations());
    }

    /**
     * Sets the policy property value. Represents a navigation property to the Teams policy assignment object.
     * @param TeamsPolicyAssignment|null $value Value to set for the policy property.
    */
    public function setPolicy(?TeamsPolicyAssignment $value): void {
        $this->policy = $value;
    }

    /**
     * Sets the telephoneNumberManagement property value. Represents a collection of available telephone number management operations.
     * @param TelephoneNumberManagementRoot|null $value Value to set for the telephoneNumberManagement property.
    */
    public function setTelephoneNumberManagement(?TelephoneNumberManagementRoot $value): void {
        $this->telephoneNumberManagement = $value;
    }

    /**
     * Sets the userConfigurations property value. Represents the configuration information of users who have accounts hosted on Microsoft Teams
     * @param array<TeamsUserConfiguration>|null $value Value to set for the userConfigurations property.
    */
    public function setUserConfigurations(?array $value): void {
        $this->userConfigurations = $value;
    }

}
