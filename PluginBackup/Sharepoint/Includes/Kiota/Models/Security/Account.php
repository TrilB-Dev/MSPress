<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Account implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<Action>|null $actions List of the type of action. The possible values are: disable, enable, forcePasswordReset, revokeAllSessions, requireUserToSignInAgain, markUserAsCompromised, unknownFutureValue.
    */
    private ?array $actions = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $identifier The account ID.
    */
    private ?string $identifier = null;
    
    /**
     * @var IdentityProvider|null $identityProvider The identityProvider property
    */
    private ?IdentityProvider $identityProvider = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new Account and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Account
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Account {
        return new Account();
    }

    /**
     * Gets the actions property value. List of the type of action. The possible values are: disable, enable, forcePasswordReset, revokeAllSessions, requireUserToSignInAgain, markUserAsCompromised, unknownFutureValue.
     * @return array<Action>|null
    */
    public function getActions(): ?array {
        return $this->actions;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'actions' => fn(ParseNode $n) => $o->setActions($n->getCollectionOfEnumValues(Action::class)),
            'identifier' => fn(ParseNode $n) => $o->setIdentifier($n->getStringValue()),
            'identityProvider' => fn(ParseNode $n) => $o->setIdentityProvider($n->getEnumValue(IdentityProvider::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the identifier property value. The account ID.
     * @return string|null
    */
    public function getIdentifier(): ?string {
        return $this->identifier;
    }

    /**
     * Gets the identityProvider property value. The identityProvider property
     * @return IdentityProvider|null
    */
    public function getIdentityProvider(): ?IdentityProvider {
        return $this->identityProvider;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfEnumValues('actions', $this->getActions());
        $writer->writeStringValue('identifier', $this->getIdentifier());
        $writer->writeEnumValue('identityProvider', $this->getIdentityProvider());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the actions property value. List of the type of action. The possible values are: disable, enable, forcePasswordReset, revokeAllSessions, requireUserToSignInAgain, markUserAsCompromised, unknownFutureValue.
     * @param array<Action>|null $value Value to set for the actions property.
    */
    public function setActions(?array $value): void {
        $this->actions = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the identifier property value. The account ID.
     * @param string|null $value Value to set for the identifier property.
    */
    public function setIdentifier(?string $value): void {
        $this->identifier = $value;
    }

    /**
     * Sets the identityProvider property value. The identityProvider property
     * @param IdentityProvider|null $value Value to set for the identityProvider property.
    */
    public function setIdentityProvider(?IdentityProvider $value): void {
        $this->identityProvider = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
