<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ArkoseFraudProtectionProvider extends FraudProtectionProvider implements Parsable 
{
    /**
     * @var string|null $clientSubDomain Used to invoke the Arkose service from the client application. Request from your Arkose Customer Success Manager or use the default client-api value.
    */
    private ?string $clientSubDomain = null;
    
    /**
     * @var string|null $privateKey The private key available on the Arkose Portal. Contact your Arkose Customer Success Manager for assistance with your keys.
    */
    private ?string $privateKey = null;
    
    /**
     * @var string|null $publicKey The public key available on the Arkose Portal. Contact your Arkose Customer Success Manager for assistance with your keys.
    */
    private ?string $publicKey = null;
    
    /**
     * @var string|null $verifySubDomain Used to invoke the Arkose service from the Microsoft authentication server. Request from your Arkose Customer Success Manager or use the default verify-api value.
    */
    private ?string $verifySubDomain = null;
    
    /**
     * Instantiates a new ArkoseFraudProtectionProvider and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.arkoseFraudProtectionProvider');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ArkoseFraudProtectionProvider
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ArkoseFraudProtectionProvider {
        return new ArkoseFraudProtectionProvider();
    }

    /**
     * Gets the clientSubDomain property value. Used to invoke the Arkose service from the client application. Request from your Arkose Customer Success Manager or use the default client-api value.
     * @return string|null
    */
    public function getClientSubDomain(): ?string {
        return $this->clientSubDomain;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'clientSubDomain' => fn(ParseNode $n) => $o->setClientSubDomain($n->getStringValue()),
            'privateKey' => fn(ParseNode $n) => $o->setPrivateKey($n->getStringValue()),
            'publicKey' => fn(ParseNode $n) => $o->setPublicKey($n->getStringValue()),
            'verifySubDomain' => fn(ParseNode $n) => $o->setVerifySubDomain($n->getStringValue()),
        ]);
    }

    /**
     * Gets the privateKey property value. The private key available on the Arkose Portal. Contact your Arkose Customer Success Manager for assistance with your keys.
     * @return string|null
    */
    public function getPrivateKey(): ?string {
        return $this->privateKey;
    }

    /**
     * Gets the publicKey property value. The public key available on the Arkose Portal. Contact your Arkose Customer Success Manager for assistance with your keys.
     * @return string|null
    */
    public function getPublicKey(): ?string {
        return $this->publicKey;
    }

    /**
     * Gets the verifySubDomain property value. Used to invoke the Arkose service from the Microsoft authentication server. Request from your Arkose Customer Success Manager or use the default verify-api value.
     * @return string|null
    */
    public function getVerifySubDomain(): ?string {
        return $this->verifySubDomain;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('clientSubDomain', $this->getClientSubDomain());
        $writer->writeStringValue('privateKey', $this->getPrivateKey());
        $writer->writeStringValue('publicKey', $this->getPublicKey());
        $writer->writeStringValue('verifySubDomain', $this->getVerifySubDomain());
    }

    /**
     * Sets the clientSubDomain property value. Used to invoke the Arkose service from the client application. Request from your Arkose Customer Success Manager or use the default client-api value.
     * @param string|null $value Value to set for the clientSubDomain property.
    */
    public function setClientSubDomain(?string $value): void {
        $this->clientSubDomain = $value;
    }

    /**
     * Sets the privateKey property value. The private key available on the Arkose Portal. Contact your Arkose Customer Success Manager for assistance with your keys.
     * @param string|null $value Value to set for the privateKey property.
    */
    public function setPrivateKey(?string $value): void {
        $this->privateKey = $value;
    }

    /**
     * Sets the publicKey property value. The public key available on the Arkose Portal. Contact your Arkose Customer Success Manager for assistance with your keys.
     * @param string|null $value Value to set for the publicKey property.
    */
    public function setPublicKey(?string $value): void {
        $this->publicKey = $value;
    }

    /**
     * Sets the verifySubDomain property value. Used to invoke the Arkose service from the Microsoft authentication server. Request from your Arkose Customer Success Manager or use the default verify-api value.
     * @param string|null $value Value to set for the verifySubDomain property.
    */
    public function setVerifySubDomain(?string $value): void {
        $this->verifySubDomain = $value;
    }

}
