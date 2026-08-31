<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Psr\Http\Message\StreamInterface;

class QrCodeImageDetails implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var StreamInterface|null $binaryValue The binary representation of the QR code image.
    */
    private ?StreamInterface $binaryValue = null;
    
    /**
     * @var ErrorCorrectionLevel|null $errorCorrectionLevel The error correction level of the QR code, which determines how much of the QR code can be damaged while still being readable. The possible values are: l, m, q, h, unknownFutureValue.
    */
    private ?ErrorCorrectionLevel $errorCorrectionLevel = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var StreamInterface|null $rawContent The raw encoded content embedded in the QR code.
    */
    private ?StreamInterface $rawContent = null;
    
    /**
     * @var int|null $version The version number of the QR code, which determines its size and data capacity.
    */
    private ?int $version = null;
    
    /**
     * Instantiates a new QrCodeImageDetails and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QrCodeImageDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QrCodeImageDetails {
        return new QrCodeImageDetails();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the binaryValue property value. The binary representation of the QR code image.
     * @return StreamInterface|null
    */
    public function getBinaryValue(): ?StreamInterface {
        return $this->binaryValue;
    }

    /**
     * Gets the errorCorrectionLevel property value. The error correction level of the QR code, which determines how much of the QR code can be damaged while still being readable. The possible values are: l, m, q, h, unknownFutureValue.
     * @return ErrorCorrectionLevel|null
    */
    public function getErrorCorrectionLevel(): ?ErrorCorrectionLevel {
        return $this->errorCorrectionLevel;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'binaryValue' => fn(ParseNode $n) => $o->setBinaryValue($n->getBinaryContent()),
            'errorCorrectionLevel' => fn(ParseNode $n) => $o->setErrorCorrectionLevel($n->getEnumValue(ErrorCorrectionLevel::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'rawContent' => fn(ParseNode $n) => $o->setRawContent($n->getBinaryContent()),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getIntegerValue()),
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
     * Gets the rawContent property value. The raw encoded content embedded in the QR code.
     * @return StreamInterface|null
    */
    public function getRawContent(): ?StreamInterface {
        return $this->rawContent;
    }

    /**
     * Gets the version property value. The version number of the QR code, which determines its size and data capacity.
     * @return int|null
    */
    public function getVersion(): ?int {
        return $this->version;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBinaryContent('binaryValue', $this->getBinaryValue());
        $writer->writeEnumValue('errorCorrectionLevel', $this->getErrorCorrectionLevel());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeBinaryContent('rawContent', $this->getRawContent());
        $writer->writeIntegerValue('version', $this->getVersion());
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
     * Sets the binaryValue property value. The binary representation of the QR code image.
     * @param StreamInterface|null $value Value to set for the binaryValue property.
    */
    public function setBinaryValue(?StreamInterface $value): void {
        $this->binaryValue = $value;
    }

    /**
     * Sets the errorCorrectionLevel property value. The error correction level of the QR code, which determines how much of the QR code can be damaged while still being readable. The possible values are: l, m, q, h, unknownFutureValue.
     * @param ErrorCorrectionLevel|null $value Value to set for the errorCorrectionLevel property.
    */
    public function setErrorCorrectionLevel(?ErrorCorrectionLevel $value): void {
        $this->errorCorrectionLevel = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the rawContent property value. The raw encoded content embedded in the QR code.
     * @param StreamInterface|null $value Value to set for the rawContent property.
    */
    public function setRawContent(?StreamInterface $value): void {
        $this->rawContent = $value;
    }

    /**
     * Sets the version property value. The version number of the QR code, which determines its size and data capacity.
     * @param int|null $value Value to set for the version property.
    */
    public function setVersion(?int $value): void {
        $this->version = $value;
    }

}
