<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ApplicationRiskFactorCertificateInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $hasBadCommonName Indicates whether the certificate's common name doesn't match the expected domain name.
    */
    private ?bool $hasBadCommonName = null;
    
    /**
     * @var bool|null $hasInsecureSignature Indicates whether the certificate uses a weak or insecure signature algorithm (for example, MD5 or SHA-1).
    */
    private ?bool $hasInsecureSignature = null;
    
    /**
     * @var bool|null $hasNoChainOfTrust Indicates whether the certificate chain of trust is incomplete or invalid.
    */
    private ?bool $hasNoChainOfTrust = null;
    
    /**
     * @var bool|null $isDenylisted Indicates whether the certificate is on a known denylist or associated with compromised issuers.
    */
    private ?bool $isDenylisted = null;
    
    /**
     * @var bool|null $isHostnameMismatch Indicates whether the certificate's hostname doesn't match the domain it was issued for.
    */
    private ?bool $isHostnameMismatch = null;
    
    /**
     * @var bool|null $isNotAfter Indicates whether the certificate is expired and no longer valid.
    */
    private ?bool $isNotAfter = null;
    
    /**
     * @var bool|null $isNotBefore Indicates whether the certificate isn't yet valid based on its activation date.
    */
    private ?bool $isNotBefore = null;
    
    /**
     * @var bool|null $isRevoked Indicates whether the issuing certificate authority revoked the certificate.
    */
    private ?bool $isRevoked = null;
    
    /**
     * @var bool|null $isSelfSigned Indicates whether the certificate is self-signed rather than issued by a trusted certificate authority.
    */
    private ?bool $isSelfSigned = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new ApplicationRiskFactorCertificateInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApplicationRiskFactorCertificateInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApplicationRiskFactorCertificateInfo {
        return new ApplicationRiskFactorCertificateInfo();
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
            'hasBadCommonName' => fn(ParseNode $n) => $o->setHasBadCommonName($n->getBooleanValue()),
            'hasInsecureSignature' => fn(ParseNode $n) => $o->setHasInsecureSignature($n->getBooleanValue()),
            'hasNoChainOfTrust' => fn(ParseNode $n) => $o->setHasNoChainOfTrust($n->getBooleanValue()),
            'isDenylisted' => fn(ParseNode $n) => $o->setIsDenylisted($n->getBooleanValue()),
            'isHostnameMismatch' => fn(ParseNode $n) => $o->setIsHostnameMismatch($n->getBooleanValue()),
            'isNotAfter' => fn(ParseNode $n) => $o->setIsNotAfter($n->getBooleanValue()),
            'isNotBefore' => fn(ParseNode $n) => $o->setIsNotBefore($n->getBooleanValue()),
            'isRevoked' => fn(ParseNode $n) => $o->setIsRevoked($n->getBooleanValue()),
            'isSelfSigned' => fn(ParseNode $n) => $o->setIsSelfSigned($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the hasBadCommonName property value. Indicates whether the certificate's common name doesn't match the expected domain name.
     * @return bool|null
    */
    public function getHasBadCommonName(): ?bool {
        return $this->hasBadCommonName;
    }

    /**
     * Gets the hasInsecureSignature property value. Indicates whether the certificate uses a weak or insecure signature algorithm (for example, MD5 or SHA-1).
     * @return bool|null
    */
    public function getHasInsecureSignature(): ?bool {
        return $this->hasInsecureSignature;
    }

    /**
     * Gets the hasNoChainOfTrust property value. Indicates whether the certificate chain of trust is incomplete or invalid.
     * @return bool|null
    */
    public function getHasNoChainOfTrust(): ?bool {
        return $this->hasNoChainOfTrust;
    }

    /**
     * Gets the isDenylisted property value. Indicates whether the certificate is on a known denylist or associated with compromised issuers.
     * @return bool|null
    */
    public function getIsDenylisted(): ?bool {
        return $this->isDenylisted;
    }

    /**
     * Gets the isHostnameMismatch property value. Indicates whether the certificate's hostname doesn't match the domain it was issued for.
     * @return bool|null
    */
    public function getIsHostnameMismatch(): ?bool {
        return $this->isHostnameMismatch;
    }

    /**
     * Gets the isNotAfter property value. Indicates whether the certificate is expired and no longer valid.
     * @return bool|null
    */
    public function getIsNotAfter(): ?bool {
        return $this->isNotAfter;
    }

    /**
     * Gets the isNotBefore property value. Indicates whether the certificate isn't yet valid based on its activation date.
     * @return bool|null
    */
    public function getIsNotBefore(): ?bool {
        return $this->isNotBefore;
    }

    /**
     * Gets the isRevoked property value. Indicates whether the issuing certificate authority revoked the certificate.
     * @return bool|null
    */
    public function getIsRevoked(): ?bool {
        return $this->isRevoked;
    }

    /**
     * Gets the isSelfSigned property value. Indicates whether the certificate is self-signed rather than issued by a trusted certificate authority.
     * @return bool|null
    */
    public function getIsSelfSigned(): ?bool {
        return $this->isSelfSigned;
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
        $writer->writeBooleanValue('hasBadCommonName', $this->getHasBadCommonName());
        $writer->writeBooleanValue('hasInsecureSignature', $this->getHasInsecureSignature());
        $writer->writeBooleanValue('hasNoChainOfTrust', $this->getHasNoChainOfTrust());
        $writer->writeBooleanValue('isDenylisted', $this->getIsDenylisted());
        $writer->writeBooleanValue('isHostnameMismatch', $this->getIsHostnameMismatch());
        $writer->writeBooleanValue('isNotAfter', $this->getIsNotAfter());
        $writer->writeBooleanValue('isNotBefore', $this->getIsNotBefore());
        $writer->writeBooleanValue('isRevoked', $this->getIsRevoked());
        $writer->writeBooleanValue('isSelfSigned', $this->getIsSelfSigned());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the hasBadCommonName property value. Indicates whether the certificate's common name doesn't match the expected domain name.
     * @param bool|null $value Value to set for the hasBadCommonName property.
    */
    public function setHasBadCommonName(?bool $value): void {
        $this->hasBadCommonName = $value;
    }

    /**
     * Sets the hasInsecureSignature property value. Indicates whether the certificate uses a weak or insecure signature algorithm (for example, MD5 or SHA-1).
     * @param bool|null $value Value to set for the hasInsecureSignature property.
    */
    public function setHasInsecureSignature(?bool $value): void {
        $this->hasInsecureSignature = $value;
    }

    /**
     * Sets the hasNoChainOfTrust property value. Indicates whether the certificate chain of trust is incomplete or invalid.
     * @param bool|null $value Value to set for the hasNoChainOfTrust property.
    */
    public function setHasNoChainOfTrust(?bool $value): void {
        $this->hasNoChainOfTrust = $value;
    }

    /**
     * Sets the isDenylisted property value. Indicates whether the certificate is on a known denylist or associated with compromised issuers.
     * @param bool|null $value Value to set for the isDenylisted property.
    */
    public function setIsDenylisted(?bool $value): void {
        $this->isDenylisted = $value;
    }

    /**
     * Sets the isHostnameMismatch property value. Indicates whether the certificate's hostname doesn't match the domain it was issued for.
     * @param bool|null $value Value to set for the isHostnameMismatch property.
    */
    public function setIsHostnameMismatch(?bool $value): void {
        $this->isHostnameMismatch = $value;
    }

    /**
     * Sets the isNotAfter property value. Indicates whether the certificate is expired and no longer valid.
     * @param bool|null $value Value to set for the isNotAfter property.
    */
    public function setIsNotAfter(?bool $value): void {
        $this->isNotAfter = $value;
    }

    /**
     * Sets the isNotBefore property value. Indicates whether the certificate isn't yet valid based on its activation date.
     * @param bool|null $value Value to set for the isNotBefore property.
    */
    public function setIsNotBefore(?bool $value): void {
        $this->isNotBefore = $value;
    }

    /**
     * Sets the isRevoked property value. Indicates whether the issuing certificate authority revoked the certificate.
     * @param bool|null $value Value to set for the isRevoked property.
    */
    public function setIsRevoked(?bool $value): void {
        $this->isRevoked = $value;
    }

    /**
     * Sets the isSelfSigned property value. Indicates whether the certificate is self-signed rather than issued by a trusted certificate authority.
     * @param bool|null $value Value to set for the isSelfSigned property.
    */
    public function setIsSelfSigned(?bool $value): void {
        $this->isSelfSigned = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
