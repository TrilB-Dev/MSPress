<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class Fido2AuthenticationMethod extends AuthenticationMethod implements Parsable 
{
    /**
     * @var string|null $aaGuid Authenticator Attestation GUID, an identifier that indicates the type (such as make and model) of the authenticator.
    */
    private ?string $aaGuid = null;
    
    /**
     * @var array<string>|null $attestationCertificates The attestation certificate or certificates attached to this passkey.
    */
    private ?array $attestationCertificates = null;
    
    /**
     * @var AttestationLevel|null $attestationLevel The attestation level of this passkey (FIDO2). The possible values are: attested, notAttested, unknownFutureValue.
    */
    private ?AttestationLevel $attestationLevel = null;
    
    /**
     * @var string|null $displayName The display name of the key as given by the user.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $model The manufacturer-assigned model of the FIDO2 passkey.
    */
    private ?string $model = null;
    
    /**
     * @var PasskeyType|null $passkeyType The type of passkey. The possible values are: deviceBound, synced, unknownFutureValue.
    */
    private ?PasskeyType $passkeyType = null;
    
    /**
     * @var WebauthnPublicKeyCredential|null $publicKeyCredential Contains the WebAuthn public key credential information being registered. This property is used only for write requests and isn't returned on read operations.
    */
    private ?WebauthnPublicKeyCredential $publicKeyCredential = null;
    
    /**
     * Instantiates a new Fido2AuthenticationMethod and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.fido2AuthenticationMethod');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Fido2AuthenticationMethod
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Fido2AuthenticationMethod {
        return new Fido2AuthenticationMethod();
    }

    /**
     * Gets the aaGuid property value. Authenticator Attestation GUID, an identifier that indicates the type (such as make and model) of the authenticator.
     * @return string|null
    */
    public function getAaGuid(): ?string {
        return $this->aaGuid;
    }

    /**
     * Gets the attestationCertificates property value. The attestation certificate or certificates attached to this passkey.
     * @return array<string>|null
    */
    public function getAttestationCertificates(): ?array {
        return $this->attestationCertificates;
    }

    /**
     * Gets the attestationLevel property value. The attestation level of this passkey (FIDO2). The possible values are: attested, notAttested, unknownFutureValue.
     * @return AttestationLevel|null
    */
    public function getAttestationLevel(): ?AttestationLevel {
        return $this->attestationLevel;
    }

    /**
     * Gets the displayName property value. The display name of the key as given by the user.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'aaGuid' => fn(ParseNode $n) => $o->setAaGuid($n->getStringValue()),
            'attestationCertificates' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAttestationCertificates($val);
            },
            'attestationLevel' => fn(ParseNode $n) => $o->setAttestationLevel($n->getEnumValue(AttestationLevel::class)),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'model' => fn(ParseNode $n) => $o->setModel($n->getStringValue()),
            'passkeyType' => fn(ParseNode $n) => $o->setPasskeyType($n->getEnumValue(PasskeyType::class)),
            'publicKeyCredential' => fn(ParseNode $n) => $o->setPublicKeyCredential($n->getObjectValue([WebauthnPublicKeyCredential::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the model property value. The manufacturer-assigned model of the FIDO2 passkey.
     * @return string|null
    */
    public function getModel(): ?string {
        return $this->model;
    }

    /**
     * Gets the passkeyType property value. The type of passkey. The possible values are: deviceBound, synced, unknownFutureValue.
     * @return PasskeyType|null
    */
    public function getPasskeyType(): ?PasskeyType {
        return $this->passkeyType;
    }

    /**
     * Gets the publicKeyCredential property value. Contains the WebAuthn public key credential information being registered. This property is used only for write requests and isn't returned on read operations.
     * @return WebauthnPublicKeyCredential|null
    */
    public function getPublicKeyCredential(): ?WebauthnPublicKeyCredential {
        return $this->publicKeyCredential;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('aaGuid', $this->getAaGuid());
        $writer->writeCollectionOfPrimitiveValues('attestationCertificates', $this->getAttestationCertificates());
        $writer->writeEnumValue('attestationLevel', $this->getAttestationLevel());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('model', $this->getModel());
        $writer->writeEnumValue('passkeyType', $this->getPasskeyType());
        $writer->writeObjectValue('publicKeyCredential', $this->getPublicKeyCredential());
    }

    /**
     * Sets the aaGuid property value. Authenticator Attestation GUID, an identifier that indicates the type (such as make and model) of the authenticator.
     * @param string|null $value Value to set for the aaGuid property.
    */
    public function setAaGuid(?string $value): void {
        $this->aaGuid = $value;
    }

    /**
     * Sets the attestationCertificates property value. The attestation certificate or certificates attached to this passkey.
     * @param array<string>|null $value Value to set for the attestationCertificates property.
    */
    public function setAttestationCertificates(?array $value): void {
        $this->attestationCertificates = $value;
    }

    /**
     * Sets the attestationLevel property value. The attestation level of this passkey (FIDO2). The possible values are: attested, notAttested, unknownFutureValue.
     * @param AttestationLevel|null $value Value to set for the attestationLevel property.
    */
    public function setAttestationLevel(?AttestationLevel $value): void {
        $this->attestationLevel = $value;
    }

    /**
     * Sets the displayName property value. The display name of the key as given by the user.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the model property value. The manufacturer-assigned model of the FIDO2 passkey.
     * @param string|null $value Value to set for the model property.
    */
    public function setModel(?string $value): void {
        $this->model = $value;
    }

    /**
     * Sets the passkeyType property value. The type of passkey. The possible values are: deviceBound, synced, unknownFutureValue.
     * @param PasskeyType|null $value Value to set for the passkeyType property.
    */
    public function setPasskeyType(?PasskeyType $value): void {
        $this->passkeyType = $value;
    }

    /**
     * Sets the publicKeyCredential property value. Contains the WebAuthn public key credential information being registered. This property is used only for write requests and isn't returned on read operations.
     * @param WebauthnPublicKeyCredential|null $value Value to set for the publicKeyCredential property.
    */
    public function setPublicKeyCredential(?WebauthnPublicKeyCredential $value): void {
        $this->publicKeyCredential = $value;
    }

}
