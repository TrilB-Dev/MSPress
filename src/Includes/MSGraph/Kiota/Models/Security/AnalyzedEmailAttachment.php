<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AnalyzedEmailAttachment implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DetonationDetails|null $detonationDetails The detonation details of the attachment.
    */
    private ?DetonationDetails $detonationDetails = null;
    
    /**
     * @var string|null $fileExtension Extension of the file.
    */
    private ?string $fileExtension = null;
    
    /**
     * @var string|null $fileName The name of the attachment in the email.
    */
    private ?string $fileName = null;
    
    /**
     * @var int|null $fileSize Size of the file.
    */
    private ?int $fileSize = null;
    
    /**
     * @var string|null $fileType The type of the attachment in the email.
    */
    private ?string $fileType = null;
    
    /**
     * @var string|null $malwareFamily The threat name associated with the threat type.
    */
    private ?string $malwareFamily = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $sha256 The SHA256 file hash of the attachment.
    */
    private ?string $sha256 = null;
    
    /**
     * @var string|null $tenantAllowBlockListDetailInfo Details of entries in tenant allow/block list configured by tenant.
    */
    private ?string $tenantAllowBlockListDetailInfo = null;
    
    /**
     * @var ThreatType|null $threatType The threat type associated with the attachment. The possible values are: unknown, spam, malware, phishing, none, unknownFutureValue.
    */
    private ?ThreatType $threatType = null;
    
    /**
     * Instantiates a new AnalyzedEmailAttachment and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AnalyzedEmailAttachment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AnalyzedEmailAttachment {
        return new AnalyzedEmailAttachment();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the detonationDetails property value. The detonation details of the attachment.
     * @return DetonationDetails|null
    */
    public function getDetonationDetails(): ?DetonationDetails {
        return $this->detonationDetails;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'detonationDetails' => fn(ParseNode $n) => $o->setDetonationDetails($n->getObjectValue([DetonationDetails::class, 'createFromDiscriminatorValue'])),
            'fileExtension' => fn(ParseNode $n) => $o->setFileExtension($n->getStringValue()),
            'fileName' => fn(ParseNode $n) => $o->setFileName($n->getStringValue()),
            'fileSize' => fn(ParseNode $n) => $o->setFileSize($n->getIntegerValue()),
            'fileType' => fn(ParseNode $n) => $o->setFileType($n->getStringValue()),
            'malwareFamily' => fn(ParseNode $n) => $o->setMalwareFamily($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'sha256' => fn(ParseNode $n) => $o->setSha256($n->getStringValue()),
            'tenantAllowBlockListDetailInfo' => fn(ParseNode $n) => $o->setTenantAllowBlockListDetailInfo($n->getStringValue()),
            'threatType' => fn(ParseNode $n) => $o->setThreatType($n->getEnumValue(ThreatType::class)),
        ];
    }

    /**
     * Gets the fileExtension property value. Extension of the file.
     * @return string|null
    */
    public function getFileExtension(): ?string {
        return $this->fileExtension;
    }

    /**
     * Gets the fileName property value. The name of the attachment in the email.
     * @return string|null
    */
    public function getFileName(): ?string {
        return $this->fileName;
    }

    /**
     * Gets the fileSize property value. Size of the file.
     * @return int|null
    */
    public function getFileSize(): ?int {
        return $this->fileSize;
    }

    /**
     * Gets the fileType property value. The type of the attachment in the email.
     * @return string|null
    */
    public function getFileType(): ?string {
        return $this->fileType;
    }

    /**
     * Gets the malwareFamily property value. The threat name associated with the threat type.
     * @return string|null
    */
    public function getMalwareFamily(): ?string {
        return $this->malwareFamily;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the sha256 property value. The SHA256 file hash of the attachment.
     * @return string|null
    */
    public function getSha256(): ?string {
        return $this->sha256;
    }

    /**
     * Gets the tenantAllowBlockListDetailInfo property value. Details of entries in tenant allow/block list configured by tenant.
     * @return string|null
    */
    public function getTenantAllowBlockListDetailInfo(): ?string {
        return $this->tenantAllowBlockListDetailInfo;
    }

    /**
     * Gets the threatType property value. The threat type associated with the attachment. The possible values are: unknown, spam, malware, phishing, none, unknownFutureValue.
     * @return ThreatType|null
    */
    public function getThreatType(): ?ThreatType {
        return $this->threatType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('detonationDetails', $this->getDetonationDetails());
        $writer->writeStringValue('fileExtension', $this->getFileExtension());
        $writer->writeStringValue('fileName', $this->getFileName());
        $writer->writeIntegerValue('fileSize', $this->getFileSize());
        $writer->writeStringValue('fileType', $this->getFileType());
        $writer->writeStringValue('malwareFamily', $this->getMalwareFamily());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('sha256', $this->getSha256());
        $writer->writeStringValue('tenantAllowBlockListDetailInfo', $this->getTenantAllowBlockListDetailInfo());
        $writer->writeEnumValue('threatType', $this->getThreatType());
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
     * Sets the detonationDetails property value. The detonation details of the attachment.
     * @param DetonationDetails|null $value Value to set for the detonationDetails property.
    */
    public function setDetonationDetails(?DetonationDetails $value): void {
        $this->detonationDetails = $value;
    }

    /**
     * Sets the fileExtension property value. Extension of the file.
     * @param string|null $value Value to set for the fileExtension property.
    */
    public function setFileExtension(?string $value): void {
        $this->fileExtension = $value;
    }

    /**
     * Sets the fileName property value. The name of the attachment in the email.
     * @param string|null $value Value to set for the fileName property.
    */
    public function setFileName(?string $value): void {
        $this->fileName = $value;
    }

    /**
     * Sets the fileSize property value. Size of the file.
     * @param int|null $value Value to set for the fileSize property.
    */
    public function setFileSize(?int $value): void {
        $this->fileSize = $value;
    }

    /**
     * Sets the fileType property value. The type of the attachment in the email.
     * @param string|null $value Value to set for the fileType property.
    */
    public function setFileType(?string $value): void {
        $this->fileType = $value;
    }

    /**
     * Sets the malwareFamily property value. The threat name associated with the threat type.
     * @param string|null $value Value to set for the malwareFamily property.
    */
    public function setMalwareFamily(?string $value): void {
        $this->malwareFamily = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the sha256 property value. The SHA256 file hash of the attachment.
     * @param string|null $value Value to set for the sha256 property.
    */
    public function setSha256(?string $value): void {
        $this->sha256 = $value;
    }

    /**
     * Sets the tenantAllowBlockListDetailInfo property value. Details of entries in tenant allow/block list configured by tenant.
     * @param string|null $value Value to set for the tenantAllowBlockListDetailInfo property.
    */
    public function setTenantAllowBlockListDetailInfo(?string $value): void {
        $this->tenantAllowBlockListDetailInfo = $value;
    }

    /**
     * Sets the threatType property value. The threat type associated with the attachment. The possible values are: unknown, spam, malware, phishing, none, unknownFutureValue.
     * @param ThreatType|null $value Value to set for the threatType property.
    */
    public function setThreatType(?ThreatType $value): void {
        $this->threatType = $value;
    }

}
