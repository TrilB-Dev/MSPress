<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PasswordAuthenticationMethod extends AuthenticationMethod implements Parsable 
{
    /**
     * @var string|null $password For security, the password is always returned as null from a LIST or GET operation.
    */
    private ?string $password = null;
    
    /**
     * Instantiates a new PasswordAuthenticationMethod and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.passwordAuthenticationMethod');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PasswordAuthenticationMethod
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PasswordAuthenticationMethod {
        return new PasswordAuthenticationMethod();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'password' => fn(ParseNode $n) => $o->setPassword($n->getStringValue()),
        ]);
    }

    /**
     * Gets the password property value. For security, the password is always returned as null from a LIST or GET operation.
     * @return string|null
    */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('password', $this->getPassword());
    }

    /**
     * Sets the password property value. For security, the password is always returned as null from a LIST or GET operation.
     * @param string|null $value Value to set for the password property.
    */
    public function setPassword(?string $value): void {
        $this->password = $value;
    }

}
