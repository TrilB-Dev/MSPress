<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BlobContainerEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $name The name of the blob container.
    */
    private ?string $name = null;
    
    /**
     * @var AzureResourceEvidence|null $storageResource The storage which the blob container belongs to.
    */
    private ?AzureResourceEvidence $storageResource = null;
    
    /**
     * @var string|null $url The full URL representation of the blob container.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new BlobContainerEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.blobContainerEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BlobContainerEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BlobContainerEvidence {
        return new BlobContainerEvidence();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'storageResource' => fn(ParseNode $n) => $o->setStorageResource($n->getObjectValue([AzureResourceEvidence::class, 'createFromDiscriminatorValue'])),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the name property value. The name of the blob container.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the storageResource property value. The storage which the blob container belongs to.
     * @return AzureResourceEvidence|null
    */
    public function getStorageResource(): ?AzureResourceEvidence {
        return $this->storageResource;
    }

    /**
     * Gets the url property value. The full URL representation of the blob container.
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
        $writer->writeStringValue('name', $this->getName());
        $writer->writeObjectValue('storageResource', $this->getStorageResource());
        $writer->writeStringValue('url', $this->getUrl());
    }

    /**
     * Sets the name property value. The name of the blob container.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the storageResource property value. The storage which the blob container belongs to.
     * @param AzureResourceEvidence|null $value Value to set for the storageResource property.
    */
    public function setStorageResource(?AzureResourceEvidence $value): void {
        $this->storageResource = $value;
    }

    /**
     * Sets the url property value. The full URL representation of the blob container.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
