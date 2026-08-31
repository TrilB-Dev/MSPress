<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Psr\Http\Message\StreamInterface;

class CertificateAuthorityDetail extends DirectoryObject implements Parsable 
{
    /**
     * @var StreamInterface|null $certificate The public key of the certificate authority.
    */
    private ?StreamInterface $certificate = null;
    
    /**
     * @var CertificateAuthorityType|null $certificateAuthorityType The type of certificate authority. The possible values are: root, intermediate, unknownFutureValue. Supports $filter (eq).
    */
    private ?CertificateAuthorityType $certificateAuthorityType = null;
    
    /**
     * @var string|null $certificateRevocationListUrl The URL to check if the certificate is revoked.
    */
    private ?string $certificateRevocationListUrl = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when the certificate authority was created.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $deltaCertificateRevocationListUrl The deltaCertificateRevocationListUrl property
    */
    private ?string $deltaCertificateRevocationListUrl = null;
    
    /**
     * @var string|null $displayName The display name of the certificate authority.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $expirationDateTime The date and time when the certificate authority expires. Supports $filter (eq) and $orderby.
    */
    private ?DateTime $expirationDateTime = null;
    
    /**
     * @var bool|null $isIssuerHintEnabled Indicates whether the certificate picker presents the certificate authority to the user to use for authentication. Default value is false. Optional.
    */
    private ?bool $isIssuerHintEnabled = null;
    
    /**
     * @var string|null $issuer The issuer of the certificate authority.
    */
    private ?string $issuer = null;
    
    /**
     * @var string|null $issuerSubjectKeyIdentifier The subject key identifier of certificate authority.
    */
    private ?string $issuerSubjectKeyIdentifier = null;
    
    /**
     * @var string|null $thumbprint The thumbprint of certificate authority certificate. Supports $filter (eq, startswith).
    */
    private ?string $thumbprint = null;
    
    /**
     * Instantiates a new CertificateAuthorityDetail and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.certificateAuthorityDetail');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CertificateAuthorityDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CertificateAuthorityDetail {
        return new CertificateAuthorityDetail();
    }

    /**
     * Gets the certificate property value. The public key of the certificate authority.
     * @return StreamInterface|null
    */
    public function getCertificate(): ?StreamInterface {
        return $this->certificate;
    }

    /**
     * Gets the certificateAuthorityType property value. The type of certificate authority. The possible values are: root, intermediate, unknownFutureValue. Supports $filter (eq).
     * @return CertificateAuthorityType|null
    */
    public function getCertificateAuthorityType(): ?CertificateAuthorityType {
        return $this->certificateAuthorityType;
    }

    /**
     * Gets the certificateRevocationListUrl property value. The URL to check if the certificate is revoked.
     * @return string|null
    */
    public function getCertificateRevocationListUrl(): ?string {
        return $this->certificateRevocationListUrl;
    }

    /**
     * Gets the createdDateTime property value. The date and time when the certificate authority was created.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the deltaCertificateRevocationListUrl property value. The deltaCertificateRevocationListUrl property
     * @return string|null
    */
    public function getDeltaCertificateRevocationListUrl(): ?string {
        return $this->deltaCertificateRevocationListUrl;
    }

    /**
     * Gets the displayName property value. The display name of the certificate authority.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the expirationDateTime property value. The date and time when the certificate authority expires. Supports $filter (eq) and $orderby.
     * @return DateTime|null
    */
    public function getExpirationDateTime(): ?DateTime {
        return $this->expirationDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'certificate' => fn(ParseNode $n) => $o->setCertificate($n->getBinaryContent()),
            'certificateAuthorityType' => fn(ParseNode $n) => $o->setCertificateAuthorityType($n->getEnumValue(CertificateAuthorityType::class)),
            'certificateRevocationListUrl' => fn(ParseNode $n) => $o->setCertificateRevocationListUrl($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'deltaCertificateRevocationListUrl' => fn(ParseNode $n) => $o->setDeltaCertificateRevocationListUrl($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'expirationDateTime' => fn(ParseNode $n) => $o->setExpirationDateTime($n->getDateTimeValue()),
            'isIssuerHintEnabled' => fn(ParseNode $n) => $o->setIsIssuerHintEnabled($n->getBooleanValue()),
            'issuer' => fn(ParseNode $n) => $o->setIssuer($n->getStringValue()),
            'issuerSubjectKeyIdentifier' => fn(ParseNode $n) => $o->setIssuerSubjectKeyIdentifier($n->getStringValue()),
            'thumbprint' => fn(ParseNode $n) => $o->setThumbprint($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isIssuerHintEnabled property value. Indicates whether the certificate picker presents the certificate authority to the user to use for authentication. Default value is false. Optional.
     * @return bool|null
    */
    public function getIsIssuerHintEnabled(): ?bool {
        return $this->isIssuerHintEnabled;
    }

    /**
     * Gets the issuer property value. The issuer of the certificate authority.
     * @return string|null
    */
    public function getIssuer(): ?string {
        return $this->issuer;
    }

    /**
     * Gets the issuerSubjectKeyIdentifier property value. The subject key identifier of certificate authority.
     * @return string|null
    */
    public function getIssuerSubjectKeyIdentifier(): ?string {
        return $this->issuerSubjectKeyIdentifier;
    }

    /**
     * Gets the thumbprint property value. The thumbprint of certificate authority certificate. Supports $filter (eq, startswith).
     * @return string|null
    */
    public function getThumbprint(): ?string {
        return $this->thumbprint;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBinaryContent('certificate', $this->getCertificate());
        $writer->writeEnumValue('certificateAuthorityType', $this->getCertificateAuthorityType());
        $writer->writeStringValue('certificateRevocationListUrl', $this->getCertificateRevocationListUrl());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('deltaCertificateRevocationListUrl', $this->getDeltaCertificateRevocationListUrl());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('expirationDateTime', $this->getExpirationDateTime());
        $writer->writeBooleanValue('isIssuerHintEnabled', $this->getIsIssuerHintEnabled());
        $writer->writeStringValue('issuer', $this->getIssuer());
        $writer->writeStringValue('issuerSubjectKeyIdentifier', $this->getIssuerSubjectKeyIdentifier());
        $writer->writeStringValue('thumbprint', $this->getThumbprint());
    }

    /**
     * Sets the certificate property value. The public key of the certificate authority.
     * @param StreamInterface|null $value Value to set for the certificate property.
    */
    public function setCertificate(?StreamInterface $value): void {
        $this->certificate = $value;
    }

    /**
     * Sets the certificateAuthorityType property value. The type of certificate authority. The possible values are: root, intermediate, unknownFutureValue. Supports $filter (eq).
     * @param CertificateAuthorityType|null $value Value to set for the certificateAuthorityType property.
    */
    public function setCertificateAuthorityType(?CertificateAuthorityType $value): void {
        $this->certificateAuthorityType = $value;
    }

    /**
     * Sets the certificateRevocationListUrl property value. The URL to check if the certificate is revoked.
     * @param string|null $value Value to set for the certificateRevocationListUrl property.
    */
    public function setCertificateRevocationListUrl(?string $value): void {
        $this->certificateRevocationListUrl = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when the certificate authority was created.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the deltaCertificateRevocationListUrl property value. The deltaCertificateRevocationListUrl property
     * @param string|null $value Value to set for the deltaCertificateRevocationListUrl property.
    */
    public function setDeltaCertificateRevocationListUrl(?string $value): void {
        $this->deltaCertificateRevocationListUrl = $value;
    }

    /**
     * Sets the displayName property value. The display name of the certificate authority.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the expirationDateTime property value. The date and time when the certificate authority expires. Supports $filter (eq) and $orderby.
     * @param DateTime|null $value Value to set for the expirationDateTime property.
    */
    public function setExpirationDateTime(?DateTime $value): void {
        $this->expirationDateTime = $value;
    }

    /**
     * Sets the isIssuerHintEnabled property value. Indicates whether the certificate picker presents the certificate authority to the user to use for authentication. Default value is false. Optional.
     * @param bool|null $value Value to set for the isIssuerHintEnabled property.
    */
    public function setIsIssuerHintEnabled(?bool $value): void {
        $this->isIssuerHintEnabled = $value;
    }

    /**
     * Sets the issuer property value. The issuer of the certificate authority.
     * @param string|null $value Value to set for the issuer property.
    */
    public function setIssuer(?string $value): void {
        $this->issuer = $value;
    }

    /**
     * Sets the issuerSubjectKeyIdentifier property value. The subject key identifier of certificate authority.
     * @param string|null $value Value to set for the issuerSubjectKeyIdentifier property.
    */
    public function setIssuerSubjectKeyIdentifier(?string $value): void {
        $this->issuerSubjectKeyIdentifier = $value;
    }

    /**
     * Sets the thumbprint property value. The thumbprint of certificate authority certificate. Supports $filter (eq, startswith).
     * @param string|null $value Value to set for the thumbprint property.
    */
    public function setThumbprint(?string $value): void {
        $this->thumbprint = $value;
    }

}
