<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class TeamsPolicyAssignment extends Entity implements Parsable 
{
    /**
     * @var array<TeamsPolicyUserAssignment>|null $userAssignments The collection of user policy assignments.
    */
    private ?array $userAssignments = null;
    
    /**
     * Instantiates a new TeamsPolicyAssignment and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TeamsPolicyAssignment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TeamsPolicyAssignment {
        return new TeamsPolicyAssignment();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'userAssignments' => fn(ParseNode $n) => $o->setUserAssignments($n->getCollectionOfObjectValues([TeamsPolicyUserAssignment::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the userAssignments property value. The collection of user policy assignments.
     * @return array<TeamsPolicyUserAssignment>|null
    */
    public function getUserAssignments(): ?array {
        return $this->userAssignments;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('userAssignments', $this->getUserAssignments());
    }

    /**
     * Sets the userAssignments property value. The collection of user policy assignments.
     * @param array<TeamsPolicyUserAssignment>|null $value Value to set for the userAssignments property.
    */
    public function setUserAssignments(?array $value): void {
        $this->userAssignments = $value;
    }

}
