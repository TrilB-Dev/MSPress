<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class FormattedContent implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $content The content of this formattedContent.
    */
    private ?string $content = null;
    
    /**
     * @var ContentFormat|null $format The format of the content. The possible values are: text, html, markdown, unknownFutureValue.
    */
    private ?ContentFormat $format = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new FormattedContent and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FormattedContent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FormattedContent {
        return new FormattedContent();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the content property value. The content of this formattedContent.
     * @return string|null
    */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'content' => fn(ParseNode $n) => $o->setContent($n->getStringValue()),
            'format' => fn(ParseNode $n) => $o->setFormat($n->getEnumValue(ContentFormat::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the format property value. The format of the content. The possible values are: text, html, markdown, unknownFutureValue.
     * @return ContentFormat|null
    */
    public function getFormat(): ?ContentFormat {
        return $this->format;
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
        $writer->writeStringValue('content', $this->getContent());
        $writer->writeEnumValue('format', $this->getFormat());
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
     * Sets the content property value. The content of this formattedContent.
     * @param string|null $value Value to set for the content property.
    */
    public function setContent(?string $value): void {
        $this->content = $value;
    }

    /**
     * Sets the format property value. The format of the content. The possible values are: text, html, markdown, unknownFutureValue.
     * @param ContentFormat|null $value Value to set for the format property.
    */
    public function setFormat(?ContentFormat $value): void {
        $this->format = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
