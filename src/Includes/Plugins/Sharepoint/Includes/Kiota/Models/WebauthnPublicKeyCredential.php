<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WebauthnPublicKeyCredential implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var WebauthnAuthenticationExtensionsClientOutputs|null $clientExtensionResults The output of the WebAuthn extension processing.
    */
    private ?WebauthnAuthenticationExtensionsClientOutputs $clientExtensionResults = null;
    
    /**
     * @var string|null $id The credential ID created by the WebAuthn Authenticator. This value is Base64URL-encoded without padding.
    */
    private ?string $id = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var WebauthnAuthenticatorAttestationResponse|null $response The response from the WebAuthn Authenticator after generating an attestation.
    */
    private ?WebauthnAuthenticatorAttestationResponse $response = null;
    
    /**
     * Instantiates a new WebauthnPublicKeyCredential and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WebauthnPublicKeyCredential
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WebauthnPublicKeyCredential {
        return new WebauthnPublicKeyCredential();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the clientExtensionResults property value. The output of the WebAuthn extension processing.
     * @return WebauthnAuthenticationExtensionsClientOutputs|null
    */
    public function getClientExtensionResults(): ?WebauthnAuthenticationExtensionsClientOutputs {
        return $this->clientExtensionResults;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'clientExtensionResults' => fn(ParseNode $n) => $o->setClientExtensionResults($n->getObjectValue([WebauthnAuthenticationExtensionsClientOutputs::class, 'createFromDiscriminatorValue'])),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'response' => fn(ParseNode $n) => $o->setResponse($n->getObjectValue([WebauthnAuthenticatorAttestationResponse::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the id property value. The credential ID created by the WebAuthn Authenticator. This value is Base64URL-encoded without padding.
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the response property value. The response from the WebAuthn Authenticator after generating an attestation.
     * @return WebauthnAuthenticatorAttestationResponse|null
    */
    public function getResponse(): ?WebauthnAuthenticatorAttestationResponse {
        return $this->response;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('clientExtensionResults', $this->getClientExtensionResults());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('response', $this->getResponse());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the clientExtensionResults property value. The output of the WebAuthn extension processing.
     * @param WebauthnAuthenticationExtensionsClientOutputs|null $value Value to set for the clientExtensionResults property.
    */
    public function setClientExtensionResults(?WebauthnAuthenticationExtensionsClientOutputs $value): void {
        $this->clientExtensionResults = $value;
    }

    /**
     * Sets the id property value. The credential ID created by the WebAuthn Authenticator. This value is Base64URL-encoded without padding.
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the response property value. The response from the WebAuthn Authenticator after generating an attestation.
     * @param WebauthnAuthenticatorAttestationResponse|null $value Value to set for the response property.
    */
    public function setResponse(?WebauthnAuthenticatorAttestationResponse $value): void {
        $this->response = $value;
    }

}
