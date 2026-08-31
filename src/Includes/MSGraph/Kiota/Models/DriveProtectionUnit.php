<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DriveProtectionUnit extends ProtectionUnitBase implements Parsable 
{
    /**
     * @var string|null $directoryObjectId ID of the directory object.
    */
    private ?string $directoryObjectId = null;
    
    /**
     * @var string|null $displayName Display name of the directory object.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $email Email associated with the directory object.
    */
    private ?string $email = null;
    
    /**
     * Instantiates a new DriveProtectionUnit and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.driveProtectionUnit');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DriveProtectionUnit
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DriveProtectionUnit {
        return new DriveProtectionUnit();
    }

    /**
     * Gets the directoryObjectId property value. ID of the directory object.
     * @return string|null
    */
    public function getDirectoryObjectId(): ?string {
        return $this->directoryObjectId;
    }

    /**
     * Gets the displayName property value. Display name of the directory object.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the email property value. Email associated with the directory object.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'directoryObjectId' => fn(ParseNode $n) => $o->setDirectoryObjectId($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('directoryObjectId', $this->getDirectoryObjectId());
    }

    /**
     * Sets the directoryObjectId property value. ID of the directory object.
     * @param string|null $value Value to set for the directoryObjectId property.
    */
    public function setDirectoryObjectId(?string $value): void {
        $this->directoryObjectId = $value;
    }

    /**
     * Sets the displayName property value. Display name of the directory object.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the email property value. Email associated with the directory object.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

}
