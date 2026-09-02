<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ContentTypeOrder implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $escapedDefault Indicates whether this is the default content type
    */
    private ?bool $escapedDefault = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var int|null $position Specifies the position in which the content type appears in the selection UI.
    */
    private ?int $position = null;
    
    /**
     * Instantiates a new ContentTypeOrder and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ContentTypeOrder
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ContentTypeOrder {
        return new ContentTypeOrder();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the default property value. Indicates whether this is the default content type
     * @return bool|null
    */
    public function getEscapedDefault(): ?bool {
        return $this->escapedDefault;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'default' => fn(ParseNode $n) => $o->setEscapedDefault($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'position' => fn(ParseNode $n) => $o->setPosition($n->getIntegerValue()),
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
     * Gets the position property value. Specifies the position in which the content type appears in the selection UI.
     * @return int|null
    */
    public function getPosition(): ?int {
        return $this->position;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('default', $this->getEscapedDefault());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeIntegerValue('position', $this->getPosition());
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
     * Sets the default property value. Indicates whether this is the default content type
     * @param bool|null $value Value to set for the default property.
    */
    public function setEscapedDefault(?bool $value): void {
        $this->escapedDefault = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the position property value. Specifies the position in which the content type appears in the selection UI.
     * @param int|null $value Value to set for the position property.
    */
    public function setPosition(?int $value): void {
        $this->position = $value;
    }

}
