<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ResourceAccessDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var ResourceAccessType|null $accessType The accessType property
    */
    private ?ResourceAccessType $accessType = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $identifier Unique identifier of the resource accessed.
    */
    private ?string $identifier = null;
    
    /**
     * @var bool|null $isCrossPromptInjectionDetected Indicates whether cross-prompt injection was detected during the access attempt.
    */
    private ?bool $isCrossPromptInjectionDetected = null;
    
    /**
     * @var string|null $labelId Identifier for the sensitivity label applied to the resource, if any.
    */
    private ?string $labelId = null;
    
    /**
     * @var string|null $name Name of the resource accessed.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ResourceAccessStatus|null $status The status property
    */
    private ?ResourceAccessStatus $status = null;
    
    /**
     * @var string|null $storageId Identifier for the resource in its native storage format. For SharePoint resources, this is the unique identifier of the list item.  For other resources, this is the name of the location, such as Box, Dropbox, Exchange, or Google Drive.
    */
    private ?string $storageId = null;
    
    /**
     * @var string|null $url URL of the resource accessed.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new ResourceAccessDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ResourceAccessDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ResourceAccessDetail {
        return new ResourceAccessDetail();
    }

    /**
     * Gets the accessType property value. The accessType property
     * @return ResourceAccessType|null
    */
    public function getAccessType(): ?ResourceAccessType {
        return $this->accessType;
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
            'accessType' => fn(ParseNode $n) => $o->setAccessType($n->getEnumValue(ResourceAccessType::class)),
            'identifier' => fn(ParseNode $n) => $o->setIdentifier($n->getStringValue()),
            'isCrossPromptInjectionDetected' => fn(ParseNode $n) => $o->setIsCrossPromptInjectionDetected($n->getBooleanValue()),
            'labelId' => fn(ParseNode $n) => $o->setLabelId($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(ResourceAccessStatus::class)),
            'storageId' => fn(ParseNode $n) => $o->setStorageId($n->getStringValue()),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the identifier property value. Unique identifier of the resource accessed.
     * @return string|null
    */
    public function getIdentifier(): ?string {
        return $this->identifier;
    }

    /**
     * Gets the isCrossPromptInjectionDetected property value. Indicates whether cross-prompt injection was detected during the access attempt.
     * @return bool|null
    */
    public function getIsCrossPromptInjectionDetected(): ?bool {
        return $this->isCrossPromptInjectionDetected;
    }

    /**
     * Gets the labelId property value. Identifier for the sensitivity label applied to the resource, if any.
     * @return string|null
    */
    public function getLabelId(): ?string {
        return $this->labelId;
    }

    /**
     * Gets the name property value. Name of the resource accessed.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the status property value. The status property
     * @return ResourceAccessStatus|null
    */
    public function getStatus(): ?ResourceAccessStatus {
        return $this->status;
    }

    /**
     * Gets the storageId property value. Identifier for the resource in its native storage format. For SharePoint resources, this is the unique identifier of the list item.  For other resources, this is the name of the location, such as Box, Dropbox, Exchange, or Google Drive.
     * @return string|null
    */
    public function getStorageId(): ?string {
        return $this->storageId;
    }

    /**
     * Gets the url property value. URL of the resource accessed.
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
        $writer->writeEnumValue('accessType', $this->getAccessType());
        $writer->writeStringValue('identifier', $this->getIdentifier());
        $writer->writeBooleanValue('isCrossPromptInjectionDetected', $this->getIsCrossPromptInjectionDetected());
        $writer->writeStringValue('labelId', $this->getLabelId());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeStringValue('storageId', $this->getStorageId());
        $writer->writeStringValue('url', $this->getUrl());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the accessType property value. The accessType property
     * @param ResourceAccessType|null $value Value to set for the accessType property.
    */
    public function setAccessType(?ResourceAccessType $value): void {
        $this->accessType = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the identifier property value. Unique identifier of the resource accessed.
     * @param string|null $value Value to set for the identifier property.
    */
    public function setIdentifier(?string $value): void {
        $this->identifier = $value;
    }

    /**
     * Sets the isCrossPromptInjectionDetected property value. Indicates whether cross-prompt injection was detected during the access attempt.
     * @param bool|null $value Value to set for the isCrossPromptInjectionDetected property.
    */
    public function setIsCrossPromptInjectionDetected(?bool $value): void {
        $this->isCrossPromptInjectionDetected = $value;
    }

    /**
     * Sets the labelId property value. Identifier for the sensitivity label applied to the resource, if any.
     * @param string|null $value Value to set for the labelId property.
    */
    public function setLabelId(?string $value): void {
        $this->labelId = $value;
    }

    /**
     * Sets the name property value. Name of the resource accessed.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param ResourceAccessStatus|null $value Value to set for the status property.
    */
    public function setStatus(?ResourceAccessStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the storageId property value. Identifier for the resource in its native storage format. For SharePoint resources, this is the unique identifier of the list item.  For other resources, this is the name of the location, such as Box, Dropbox, Exchange, or Google Drive.
     * @param string|null $value Value to set for the storageId property.
    */
    public function setStorageId(?string $value): void {
        $this->storageId = $value;
    }

    /**
     * Sets the url property value. URL of the resource accessed.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
