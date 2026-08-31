<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageResourceRoleScope extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var AccessPackageResourceRole|null $role The role property
    */
    private ?AccessPackageResourceRole $role = null;
    
    /**
     * @var AccessPackageResourceScope|null $scope The scope property
    */
    private ?AccessPackageResourceScope $scope = null;
    
    /**
     * Instantiates a new AccessPackageResourceRoleScope and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageResourceRoleScope
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageResourceRoleScope {
        return new AccessPackageResourceRoleScope();
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'role' => fn(ParseNode $n) => $o->setRole($n->getObjectValue([AccessPackageResourceRole::class, 'createFromDiscriminatorValue'])),
            'scope' => fn(ParseNode $n) => $o->setScope($n->getObjectValue([AccessPackageResourceScope::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the role property value. The role property
     * @return AccessPackageResourceRole|null
    */
    public function getRole(): ?AccessPackageResourceRole {
        return $this->role;
    }

    /**
     * Gets the scope property value. The scope property
     * @return AccessPackageResourceScope|null
    */
    public function getScope(): ?AccessPackageResourceScope {
        return $this->scope;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeObjectValue('role', $this->getRole());
        $writer->writeObjectValue('scope', $this->getScope());
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the role property value. The role property
     * @param AccessPackageResourceRole|null $value Value to set for the role property.
    */
    public function setRole(?AccessPackageResourceRole $value): void {
        $this->role = $value;
    }

    /**
     * Sets the scope property value. The scope property
     * @param AccessPackageResourceScope|null $value Value to set for the scope property.
    */
    public function setScope(?AccessPackageResourceScope $value): void {
        $this->scope = $value;
    }

}
