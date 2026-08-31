<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\User;

class ActivateUserScope extends ActivationScope implements Parsable 
{
    /**
     * @var array<User>|null $users The users property
    */
    private ?array $users = null;
    
    /**
     * Instantiates a new ActivateUserScope and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.identityGovernance.activateUserScope');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ActivateUserScope
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ActivateUserScope {
        return new ActivateUserScope();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'users' => fn(ParseNode $n) => $o->setUsers($n->getCollectionOfObjectValues([User::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the users property value. The users property
     * @return array<User>|null
    */
    public function getUsers(): ?array {
        return $this->users;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('users', $this->getUsers());
    }

    /**
     * Sets the users property value. The users property
     * @param array<User>|null $value Value to set for the users property.
    */
    public function setUsers(?array $value): void {
        $this->users = $value;
    }

}
