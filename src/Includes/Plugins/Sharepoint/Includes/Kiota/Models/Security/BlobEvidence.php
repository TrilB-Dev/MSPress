<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BlobEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var BlobContainerEvidence|null $blobContainer The container which the blob belongs to.
    */
    private ?BlobContainerEvidence $blobContainer = null;
    
    /**
     * @var string|null $etag The Etag associated with this blob.
    */
    private ?string $etag = null;
    
    /**
     * @var array<FileHash>|null $fileHashes The file hashes associated with this blob.
    */
    private ?array $fileHashes = null;
    
    /**
     * @var string|null $name The name of the blob.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $url The full URL representation of the blob.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new BlobEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.blobEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BlobEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BlobEvidence {
        return new BlobEvidence();
    }

    /**
     * Gets the blobContainer property value. The container which the blob belongs to.
     * @return BlobContainerEvidence|null
    */
    public function getBlobContainer(): ?BlobContainerEvidence {
        return $this->blobContainer;
    }

    /**
     * Gets the etag property value. The Etag associated with this blob.
     * @return string|null
    */
    public function getEtag(): ?string {
        return $this->etag;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'blobContainer' => fn(ParseNode $n) => $o->setBlobContainer($n->getObjectValue([BlobContainerEvidence::class, 'createFromDiscriminatorValue'])),
            'etag' => fn(ParseNode $n) => $o->setEtag($n->getStringValue()),
            'fileHashes' => fn(ParseNode $n) => $o->setFileHashes($n->getCollectionOfObjectValues([FileHash::class, 'createFromDiscriminatorValue'])),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the fileHashes property value. The file hashes associated with this blob.
     * @return array<FileHash>|null
    */
    public function getFileHashes(): ?array {
        return $this->fileHashes;
    }

    /**
     * Gets the name property value. The name of the blob.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the url property value. The full URL representation of the blob.
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('blobContainer', $this->getBlobContainer());
        $writer->writeStringValue('etag', $this->getEtag());
        $writer->writeCollectionOfObjectValues('fileHashes', $this->getFileHashes());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('url', $this->getUrl());
    }

    /**
     * Sets the blobContainer property value. The container which the blob belongs to.
     * @param BlobContainerEvidence|null $value Value to set for the blobContainer property.
    */
    public function setBlobContainer(?BlobContainerEvidence $value): void {
        $this->blobContainer = $value;
    }

    /**
     * Sets the etag property value. The Etag associated with this blob.
     * @param string|null $value Value to set for the etag property.
    */
    public function setEtag(?string $value): void {
        $this->etag = $value;
    }

    /**
     * Sets the fileHashes property value. The file hashes associated with this blob.
     * @param array<FileHash>|null $value Value to set for the fileHashes property.
    */
    public function setFileHashes(?array $value): void {
        $this->fileHashes = $value;
    }

    /**
     * Sets the name property value. The name of the blob.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the url property value. The full URL representation of the blob.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
