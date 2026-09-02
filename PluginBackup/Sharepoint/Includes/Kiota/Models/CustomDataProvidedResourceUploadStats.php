<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CustomDataProvidedResourceUploadStats implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $filesUploaded Number of files uploaded in this session.
    */
    private ?int $filesUploaded = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var int|null $totalBytesUploaded Total bytes uploaded in this session.
    */
    private ?int $totalBytesUploaded = null;
    
    /**
     * Instantiates a new CustomDataProvidedResourceUploadStats and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CustomDataProvidedResourceUploadStats
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CustomDataProvidedResourceUploadStats {
        return new CustomDataProvidedResourceUploadStats();
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
            'filesUploaded' => fn(ParseNode $n) => $o->setFilesUploaded($n->getIntegerValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'totalBytesUploaded' => fn(ParseNode $n) => $o->setTotalBytesUploaded($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the filesUploaded property value. Number of files uploaded in this session.
     * @return int|null
    */
    public function getFilesUploaded(): ?int {
        return $this->filesUploaded;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the totalBytesUploaded property value. Total bytes uploaded in this session.
     * @return int|null
    */
    public function getTotalBytesUploaded(): ?int {
        return $this->totalBytesUploaded;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('filesUploaded', $this->getFilesUploaded());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeIntegerValue('totalBytesUploaded', $this->getTotalBytesUploaded());
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
     * Sets the filesUploaded property value. Number of files uploaded in this session.
     * @param int|null $value Value to set for the filesUploaded property.
    */
    public function setFilesUploaded(?int $value): void {
        $this->filesUploaded = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the totalBytesUploaded property value. Total bytes uploaded in this session.
     * @param int|null $value Value to set for the totalBytesUploaded property.
    */
    public function setTotalBytesUploaded(?int $value): void {
        $this->totalBytesUploaded = $value;
    }

}
