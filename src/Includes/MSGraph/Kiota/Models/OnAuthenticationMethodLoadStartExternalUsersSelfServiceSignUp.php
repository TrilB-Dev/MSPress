<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OnAuthenticationMethodLoadStartExternalUsersSelfServiceSignUp extends OnAuthenticationMethodLoadStartHandler implements Parsable 
{
    /**
     * @var array<IdentityProviderBase>|null $identityProviders The identityProviders property
    */
    private ?array $identityProviders = null;
    
    /**
     * Instantiates a new OnAuthenticationMethodLoadStartExternalUsersSelfServiceSignUp and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.onAuthenticationMethodLoadStartExternalUsersSelfServiceSignUp');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnAuthenticationMethodLoadStartExternalUsersSelfServiceSignUp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnAuthenticationMethodLoadStartExternalUsersSelfServiceSignUp {
        return new OnAuthenticationMethodLoadStartExternalUsersSelfServiceSignUp();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'identityProviders' => fn(ParseNode $n) => $o->setIdentityProviders($n->getCollectionOfObjectValues([IdentityProviderBase::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the identityProviders property value. The identityProviders property
     * @return array<IdentityProviderBase>|null
    */
    public function getIdentityProviders(): ?array {
        return $this->identityProviders;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('identityProviders', $this->getIdentityProviders());
    }

    /**
     * Sets the identityProviders property value. The identityProviders property
     * @param array<IdentityProviderBase>|null $value Value to set for the identityProviders property.
    */
    public function setIdentityProviders(?array $value): void {
        $this->identityProviders = $value;
    }

}
