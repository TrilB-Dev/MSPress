<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class X509CertificateRule implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $identifier The identifier of the X.509 certificate. Required.
    */
    private ?string $identifier = null;
    
    /**
     * @var string|null $issuerSubjectIdentifier The issuerSubjectIdentifier property
    */
    private ?string $issuerSubjectIdentifier = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $policyOidIdentifier The policyOidIdentifier property
    */
    private ?string $policyOidIdentifier = null;
    
    /**
     * @var X509CertificateAuthenticationMode|null $x509CertificateAuthenticationMode The type of strong authentication mode. The possible values are: x509CertificateSingleFactor, x509CertificateMultiFactor, unknownFutureValue. Required.
    */
    private ?X509CertificateAuthenticationMode $x509CertificateAuthenticationMode = null;
    
    /**
     * @var X509CertificateAffinityLevel|null $x509CertificateRequiredAffinityLevel The x509CertificateRequiredAffinityLevel property
    */
    private ?X509CertificateAffinityLevel $x509CertificateRequiredAffinityLevel = null;
    
    /**
     * @var X509CertificateRuleType|null $x509CertificateRuleType The type of the X.509 certificate mode configuration rule. The possible values are: issuerSubject, policyOID, unknownFutureValue. Required.
    */
    private ?X509CertificateRuleType $x509CertificateRuleType = null;
    
    /**
     * Instantiates a new X509CertificateRule and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return X509CertificateRule
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): X509CertificateRule {
        return new X509CertificateRule();
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
            'identifier' => fn(ParseNode $n) => $o->setIdentifier($n->getStringValue()),
            'issuerSubjectIdentifier' => fn(ParseNode $n) => $o->setIssuerSubjectIdentifier($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'policyOidIdentifier' => fn(ParseNode $n) => $o->setPolicyOidIdentifier($n->getStringValue()),
            'x509CertificateAuthenticationMode' => fn(ParseNode $n) => $o->setX509CertificateAuthenticationMode($n->getEnumValue(X509CertificateAuthenticationMode::class)),
            'x509CertificateRequiredAffinityLevel' => fn(ParseNode $n) => $o->setX509CertificateRequiredAffinityLevel($n->getEnumValue(X509CertificateAffinityLevel::class)),
            'x509CertificateRuleType' => fn(ParseNode $n) => $o->setX509CertificateRuleType($n->getEnumValue(X509CertificateRuleType::class)),
        ];
    }

    /**
     * Gets the identifier property value. The identifier of the X.509 certificate. Required.
     * @return string|null
    */
    public function getIdentifier(): ?string {
        return $this->identifier;
    }

    /**
     * Gets the issuerSubjectIdentifier property value. The issuerSubjectIdentifier property
     * @return string|null
    */
    public function getIssuerSubjectIdentifier(): ?string {
        return $this->issuerSubjectIdentifier;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the policyOidIdentifier property value. The policyOidIdentifier property
     * @return string|null
    */
    public function getPolicyOidIdentifier(): ?string {
        return $this->policyOidIdentifier;
    }

    /**
     * Gets the x509CertificateAuthenticationMode property value. The type of strong authentication mode. The possible values are: x509CertificateSingleFactor, x509CertificateMultiFactor, unknownFutureValue. Required.
     * @return X509CertificateAuthenticationMode|null
    */
    public function getX509CertificateAuthenticationMode(): ?X509CertificateAuthenticationMode {
        return $this->x509CertificateAuthenticationMode;
    }

    /**
     * Gets the x509CertificateRequiredAffinityLevel property value. The x509CertificateRequiredAffinityLevel property
     * @return X509CertificateAffinityLevel|null
    */
    public function getX509CertificateRequiredAffinityLevel(): ?X509CertificateAffinityLevel {
        return $this->x509CertificateRequiredAffinityLevel;
    }

    /**
     * Gets the x509CertificateRuleType property value. The type of the X.509 certificate mode configuration rule. The possible values are: issuerSubject, policyOID, unknownFutureValue. Required.
     * @return X509CertificateRuleType|null
    */
    public function getX509CertificateRuleType(): ?X509CertificateRuleType {
        return $this->x509CertificateRuleType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('identifier', $this->getIdentifier());
        $writer->writeStringValue('issuerSubjectIdentifier', $this->getIssuerSubjectIdentifier());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('policyOidIdentifier', $this->getPolicyOidIdentifier());
        $writer->writeEnumValue('x509CertificateAuthenticationMode', $this->getX509CertificateAuthenticationMode());
        $writer->writeEnumValue('x509CertificateRequiredAffinityLevel', $this->getX509CertificateRequiredAffinityLevel());
        $writer->writeEnumValue('x509CertificateRuleType', $this->getX509CertificateRuleType());
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
     * Sets the identifier property value. The identifier of the X.509 certificate. Required.
     * @param string|null $value Value to set for the identifier property.
    */
    public function setIdentifier(?string $value): void {
        $this->identifier = $value;
    }

    /**
     * Sets the issuerSubjectIdentifier property value. The issuerSubjectIdentifier property
     * @param string|null $value Value to set for the issuerSubjectIdentifier property.
    */
    public function setIssuerSubjectIdentifier(?string $value): void {
        $this->issuerSubjectIdentifier = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the policyOidIdentifier property value. The policyOidIdentifier property
     * @param string|null $value Value to set for the policyOidIdentifier property.
    */
    public function setPolicyOidIdentifier(?string $value): void {
        $this->policyOidIdentifier = $value;
    }

    /**
     * Sets the x509CertificateAuthenticationMode property value. The type of strong authentication mode. The possible values are: x509CertificateSingleFactor, x509CertificateMultiFactor, unknownFutureValue. Required.
     * @param X509CertificateAuthenticationMode|null $value Value to set for the x509CertificateAuthenticationMode property.
    */
    public function setX509CertificateAuthenticationMode(?X509CertificateAuthenticationMode $value): void {
        $this->x509CertificateAuthenticationMode = $value;
    }

    /**
     * Sets the x509CertificateRequiredAffinityLevel property value. The x509CertificateRequiredAffinityLevel property
     * @param X509CertificateAffinityLevel|null $value Value to set for the x509CertificateRequiredAffinityLevel property.
    */
    public function setX509CertificateRequiredAffinityLevel(?X509CertificateAffinityLevel $value): void {
        $this->x509CertificateRequiredAffinityLevel = $value;
    }

    /**
     * Sets the x509CertificateRuleType property value. The type of the X.509 certificate mode configuration rule. The possible values are: issuerSubject, policyOID, unknownFutureValue. Required.
     * @param X509CertificateRuleType|null $value Value to set for the x509CertificateRuleType property.
    */
    public function setX509CertificateRuleType(?X509CertificateRuleType $value): void {
        $this->x509CertificateRuleType = $value;
    }

}
