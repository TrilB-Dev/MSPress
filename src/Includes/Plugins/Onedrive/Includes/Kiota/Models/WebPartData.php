<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WebPartData implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $dataVersion Data version of the web part. The value is defined by the web part developer. Different dataVersions usually refers to a different property structure.
    */
    private ?string $dataVersion = null;
    
    /**
     * @var string|null $description Description of the web part.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ServerProcessedContent|null $serverProcessedContent Contains collections of data that can be processed by server side services like search index and link fixup.
    */
    private ?ServerProcessedContent $serverProcessedContent = null;
    
    /**
     * @var string|null $title Title of the web part.
    */
    private ?string $title = null;
    
    /**
     * Instantiates a new WebPartData and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WebPartData
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WebPartData {
        return new WebPartData();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dataVersion property value. Data version of the web part. The value is defined by the web part developer. Different dataVersions usually refers to a different property structure.
     * @return string|null
    */
    public function getDataVersion(): ?string {
        return $this->dataVersion;
    }

    /**
     * Gets the description property value. Description of the web part.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dataVersion' => fn(ParseNode $n) => $o->setDataVersion($n->getStringValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'serverProcessedContent' => fn(ParseNode $n) => $o->setServerProcessedContent($n->getObjectValue([ServerProcessedContent::class, 'createFromDiscriminatorValue'])),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
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
     * Gets the serverProcessedContent property value. Contains collections of data that can be processed by server side services like search index and link fixup.
     * @return ServerProcessedContent|null
    */
    public function getServerProcessedContent(): ?ServerProcessedContent {
        return $this->serverProcessedContent;
    }

    /**
     * Gets the title property value. Title of the web part.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('dataVersion', $this->getDataVersion());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('serverProcessedContent', $this->getServerProcessedContent());
        $writer->writeStringValue('title', $this->getTitle());
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
     * Sets the dataVersion property value. Data version of the web part. The value is defined by the web part developer. Different dataVersions usually refers to a different property structure.
     * @param string|null $value Value to set for the dataVersion property.
    */
    public function setDataVersion(?string $value): void {
        $this->dataVersion = $value;
    }

    /**
     * Sets the description property value. Description of the web part.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the serverProcessedContent property value. Contains collections of data that can be processed by server side services like search index and link fixup.
     * @param ServerProcessedContent|null $value Value to set for the serverProcessedContent property.
    */
    public function setServerProcessedContent(?ServerProcessedContent $value): void {
        $this->serverProcessedContent = $value;
    }

    /**
     * Sets the title property value. Title of the web part.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

}
