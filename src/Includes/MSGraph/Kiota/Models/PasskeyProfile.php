<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PasskeyProfile extends Entity implements Parsable 
{
    /**
     * @var AttestationEnforcement|null $attestationEnforcement The attestationEnforcement property
    */
    private ?AttestationEnforcement $attestationEnforcement = null;
    
    /**
     * @var Fido2KeyRestrictions|null $keyRestrictions Controls whether key restrictions are enforced on passkeys (FIDO2), either allowing or disallowing certain key types as defined by Authenticator Attestation GUID (AAGUID), an identifier that indicates the type (for example, make and model) of the authenticator. Required.
    */
    private ?Fido2KeyRestrictions $keyRestrictions = null;
    
    /**
     * @var string|null $name Name of the passkey profile. Required.
    */
    private ?string $name = null;
    
    /**
     * @var PasskeyTypes|null $passkeyTypes Specifies which types of passkeys are targeted in this passkey profile. Required. The possible values are: deviceBound, synced, unknownFutureValue.
    */
    private ?PasskeyTypes $passkeyTypes = null;
    
    /**
     * Instantiates a new PasskeyProfile and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PasskeyProfile
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PasskeyProfile {
        return new PasskeyProfile();
    }

    /**
     * Gets the attestationEnforcement property value. The attestationEnforcement property
     * @return AttestationEnforcement|null
    */
    public function getAttestationEnforcement(): ?AttestationEnforcement {
        return $this->attestationEnforcement;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'attestationEnforcement' => fn(ParseNode $n) => $o->setAttestationEnforcement($n->getEnumValue(AttestationEnforcement::class)),
            'keyRestrictions' => fn(ParseNode $n) => $o->setKeyRestrictions($n->getObjectValue([Fido2KeyRestrictions::class, 'createFromDiscriminatorValue'])),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'passkeyTypes' => fn(ParseNode $n) => $o->setPasskeyTypes($n->getEnumValue(PasskeyTypes::class)),
        ]);
    }

    /**
     * Gets the keyRestrictions property value. Controls whether key restrictions are enforced on passkeys (FIDO2), either allowing or disallowing certain key types as defined by Authenticator Attestation GUID (AAGUID), an identifier that indicates the type (for example, make and model) of the authenticator. Required.
     * @return Fido2KeyRestrictions|null
    */
    public function getKeyRestrictions(): ?Fido2KeyRestrictions {
        return $this->keyRestrictions;
    }

    /**
     * Gets the name property value. Name of the passkey profile. Required.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the passkeyTypes property value. Specifies which types of passkeys are targeted in this passkey profile. Required. The possible values are: deviceBound, synced, unknownFutureValue.
     * @return PasskeyTypes|null
    */
    public function getPasskeyTypes(): ?PasskeyTypes {
        return $this->passkeyTypes;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('attestationEnforcement', $this->getAttestationEnforcement());
        $writer->writeObjectValue('keyRestrictions', $this->getKeyRestrictions());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeEnumValue('passkeyTypes', $this->getPasskeyTypes());
    }

    /**
     * Sets the attestationEnforcement property value. The attestationEnforcement property
     * @param AttestationEnforcement|null $value Value to set for the attestationEnforcement property.
    */
    public function setAttestationEnforcement(?AttestationEnforcement $value): void {
        $this->attestationEnforcement = $value;
    }

    /**
     * Sets the keyRestrictions property value. Controls whether key restrictions are enforced on passkeys (FIDO2), either allowing or disallowing certain key types as defined by Authenticator Attestation GUID (AAGUID), an identifier that indicates the type (for example, make and model) of the authenticator. Required.
     * @param Fido2KeyRestrictions|null $value Value to set for the keyRestrictions property.
    */
    public function setKeyRestrictions(?Fido2KeyRestrictions $value): void {
        $this->keyRestrictions = $value;
    }

    /**
     * Sets the name property value. Name of the passkey profile. Required.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the passkeyTypes property value. Specifies which types of passkeys are targeted in this passkey profile. Required. The possible values are: deviceBound, synced, unknownFutureValue.
     * @param PasskeyTypes|null $value Value to set for the passkeyTypes property.
    */
    public function setPasskeyTypes(?PasskeyTypes $value): void {
        $this->passkeyTypes = $value;
    }

}
