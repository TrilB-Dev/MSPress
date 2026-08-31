<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointMigrationContainerInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $dataContainerUri A valid URL with a SAS token for accessing the Azure blob storage container that contains the file content. Read-only.
    */
    private ?string $dataContainerUri = null;
    
    /**
     * @var string|null $encryptionKey Provides the AES-256-CBC encryption key if files stored in Azure blob containers are encrypted. The key is Base64-encoded. Read-only.
    */
    private ?string $encryptionKey = null;
    
    /**
     * @var string|null $metadataContainerUri A valid URL with a SAS token for accessing the Azure blob storage container that contains the file metadata. Read-only.
    */
    private ?string $metadataContainerUri = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new SharePointMigrationContainerInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointMigrationContainerInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointMigrationContainerInfo {
        return new SharePointMigrationContainerInfo();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dataContainerUri property value. A valid URL with a SAS token for accessing the Azure blob storage container that contains the file content. Read-only.
     * @return string|null
    */
    public function getDataContainerUri(): ?string {
        return $this->dataContainerUri;
    }

    /**
     * Gets the encryptionKey property value. Provides the AES-256-CBC encryption key if files stored in Azure blob containers are encrypted. The key is Base64-encoded. Read-only.
     * @return string|null
    */
    public function getEncryptionKey(): ?string {
        return $this->encryptionKey;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dataContainerUri' => fn(ParseNode $n) => $o->setDataContainerUri($n->getStringValue()),
            'encryptionKey' => fn(ParseNode $n) => $o->setEncryptionKey($n->getStringValue()),
            'metadataContainerUri' => fn(ParseNode $n) => $o->setMetadataContainerUri($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the metadataContainerUri property value. A valid URL with a SAS token for accessing the Azure blob storage container that contains the file metadata. Read-only.
     * @return string|null
    */
    public function getMetadataContainerUri(): ?string {
        return $this->metadataContainerUri;
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
        $writer->writeStringValue('dataContainerUri', $this->getDataContainerUri());
        $writer->writeStringValue('encryptionKey', $this->getEncryptionKey());
        $writer->writeStringValue('metadataContainerUri', $this->getMetadataContainerUri());
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
     * Sets the dataContainerUri property value. A valid URL with a SAS token for accessing the Azure blob storage container that contains the file content. Read-only.
     * @param string|null $value Value to set for the dataContainerUri property.
    */
    public function setDataContainerUri(?string $value): void {
        $this->dataContainerUri = $value;
    }

    /**
     * Sets the encryptionKey property value. Provides the AES-256-CBC encryption key if files stored in Azure blob containers are encrypted. The key is Base64-encoded. Read-only.
     * @param string|null $value Value to set for the encryptionKey property.
    */
    public function setEncryptionKey(?string $value): void {
        $this->encryptionKey = $value;
    }

    /**
     * Sets the metadataContainerUri property value. A valid URL with a SAS token for accessing the Azure blob storage container that contains the file metadata. Read-only.
     * @param string|null $value Value to set for the metadataContainerUri property.
    */
    public function setMetadataContainerUri(?string $value): void {
        $this->metadataContainerUri = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
