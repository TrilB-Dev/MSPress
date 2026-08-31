<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class X509CertificateAuthenticationModeConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<X509CertificateRule>|null $rules Rules are configured in addition to the authentication mode to bind a specific x509CertificateRuleType to an x509CertificateAuthenticationMode. For example, bind the policyOID with identifier 1.32.132.343 to x509CertificateMultiFactor authentication mode.
    */
    private ?array $rules = null;
    
    /**
     * @var X509CertificateAuthenticationMode|null $x509CertificateAuthenticationDefaultMode The type of strong authentication mode. The possible values are: x509CertificateSingleFactor, x509CertificateMultiFactor, unknownFutureValue.
    */
    private ?X509CertificateAuthenticationMode $x509CertificateAuthenticationDefaultMode = null;
    
    /**
     * @var X509CertificateAffinityLevel|null $x509CertificateDefaultRequiredAffinityLevel The x509CertificateDefaultRequiredAffinityLevel property
    */
    private ?X509CertificateAffinityLevel $x509CertificateDefaultRequiredAffinityLevel = null;
    
    /**
     * Instantiates a new X509CertificateAuthenticationModeConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return X509CertificateAuthenticationModeConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): X509CertificateAuthenticationModeConfiguration {
        return new X509CertificateAuthenticationModeConfiguration();
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
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'rules' => fn(ParseNode $n) => $o->setRules($n->getCollectionOfObjectValues([X509CertificateRule::class, 'createFromDiscriminatorValue'])),
            'x509CertificateAuthenticationDefaultMode' => fn(ParseNode $n) => $o->setX509CertificateAuthenticationDefaultMode($n->getEnumValue(X509CertificateAuthenticationMode::class)),
            'x509CertificateDefaultRequiredAffinityLevel' => fn(ParseNode $n) => $o->setX509CertificateDefaultRequiredAffinityLevel($n->getEnumValue(X509CertificateAffinityLevel::class)),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the rules property value. Rules are configured in addition to the authentication mode to bind a specific x509CertificateRuleType to an x509CertificateAuthenticationMode. For example, bind the policyOID with identifier 1.32.132.343 to x509CertificateMultiFactor authentication mode.
     * @return array<X509CertificateRule>|null
    */
    public function getRules(): ?array {
        return $this->rules;
    }

    /**
     * Gets the x509CertificateAuthenticationDefaultMode property value. The type of strong authentication mode. The possible values are: x509CertificateSingleFactor, x509CertificateMultiFactor, unknownFutureValue.
     * @return X509CertificateAuthenticationMode|null
    */
    public function getX509CertificateAuthenticationDefaultMode(): ?X509CertificateAuthenticationMode {
        return $this->x509CertificateAuthenticationDefaultMode;
    }

    /**
     * Gets the x509CertificateDefaultRequiredAffinityLevel property value. The x509CertificateDefaultRequiredAffinityLevel property
     * @return X509CertificateAffinityLevel|null
    */
    public function getX509CertificateDefaultRequiredAffinityLevel(): ?X509CertificateAffinityLevel {
        return $this->x509CertificateDefaultRequiredAffinityLevel;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfObjectValues('rules', $this->getRules());
        $writer->writeEnumValue('x509CertificateAuthenticationDefaultMode', $this->getX509CertificateAuthenticationDefaultMode());
        $writer->writeEnumValue('x509CertificateDefaultRequiredAffinityLevel', $this->getX509CertificateDefaultRequiredAffinityLevel());
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
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the rules property value. Rules are configured in addition to the authentication mode to bind a specific x509CertificateRuleType to an x509CertificateAuthenticationMode. For example, bind the policyOID with identifier 1.32.132.343 to x509CertificateMultiFactor authentication mode.
     * @param array<X509CertificateRule>|null $value Value to set for the rules property.
    */
    public function setRules(?array $value): void {
        $this->rules = $value;
    }

    /**
     * Sets the x509CertificateAuthenticationDefaultMode property value. The type of strong authentication mode. The possible values are: x509CertificateSingleFactor, x509CertificateMultiFactor, unknownFutureValue.
     * @param X509CertificateAuthenticationMode|null $value Value to set for the x509CertificateAuthenticationDefaultMode property.
    */
    public function setX509CertificateAuthenticationDefaultMode(?X509CertificateAuthenticationMode $value): void {
        $this->x509CertificateAuthenticationDefaultMode = $value;
    }

    /**
     * Sets the x509CertificateDefaultRequiredAffinityLevel property value. The x509CertificateDefaultRequiredAffinityLevel property
     * @param X509CertificateAffinityLevel|null $value Value to set for the x509CertificateDefaultRequiredAffinityLevel property.
    */
    public function setX509CertificateDefaultRequiredAffinityLevel(?X509CertificateAffinityLevel $value): void {
        $this->x509CertificateDefaultRequiredAffinityLevel = $value;
    }

}
