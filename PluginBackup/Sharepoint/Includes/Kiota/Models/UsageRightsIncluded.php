<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UsageRightsIncluded extends Entity implements Parsable 
{
    /**
     * @var string|null $ownerEmail The email of owner label rights.
    */
    private ?string $ownerEmail = null;
    
    /**
     * @var string|null $userEmail The email of user with label user rights.
    */
    private ?string $userEmail = null;
    
    /**
     * @var UsageRights|null $value The value property
    */
    private ?UsageRights $value = null;
    
    /**
     * Instantiates a new UsageRightsIncluded and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UsageRightsIncluded
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UsageRightsIncluded {
        return new UsageRightsIncluded();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'ownerEmail' => fn(ParseNode $n) => $o->setOwnerEmail($n->getStringValue()),
            'userEmail' => fn(ParseNode $n) => $o->setUserEmail($n->getStringValue()),
            'value' => fn(ParseNode $n) => $o->setValue($n->getEnumValue(UsageRights::class)),
        ]);
    }

    /**
     * Gets the ownerEmail property value. The email of owner label rights.
     * @return string|null
    */
    public function getOwnerEmail(): ?string {
        return $this->ownerEmail;
    }

    /**
     * Gets the userEmail property value. The email of user with label user rights.
     * @return string|null
    */
    public function getUserEmail(): ?string {
        return $this->userEmail;
    }

    /**
     * Gets the value property value. The value property
     * @return UsageRights|null
    */
    public function getValue(): ?UsageRights {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('ownerEmail', $this->getOwnerEmail());
        $writer->writeStringValue('userEmail', $this->getUserEmail());
        $writer->writeEnumValue('value', $this->getValue());
    }

    /**
     * Sets the ownerEmail property value. The email of owner label rights.
     * @param string|null $value Value to set for the ownerEmail property.
    */
    public function setOwnerEmail(?string $value): void {
        $this->ownerEmail = $value;
    }

    /**
     * Sets the userEmail property value. The email of user with label user rights.
     * @param string|null $value Value to set for the userEmail property.
    */
    public function setUserEmail(?string $value): void {
        $this->userEmail = $value;
    }

    /**
     * Sets the value property value. The value property
     * @param UsageRights|null $value Value to set for the value property.
    */
    public function setValue(?UsageRights $value): void {
        $this->value = $value;
    }

}
