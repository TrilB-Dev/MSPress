<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PackageElementDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<PackageElement>|null $elements The elements property
    */
    private ?array $elements = null;
    
    /**
     * @var string|null $elementType The elementType property
    */
    private ?string $elementType = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new PackageElementDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PackageElementDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PackageElementDetail {
        return new PackageElementDetail();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the elements property value. The elements property
     * @return array<PackageElement>|null
    */
    public function getElements(): ?array {
        return $this->elements;
    }

    /**
     * Gets the elementType property value. The elementType property
     * @return string|null
    */
    public function getElementType(): ?string {
        return $this->elementType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'elements' => fn(ParseNode $n) => $o->setElements($n->getCollectionOfObjectValues([PackageElement::class, 'createFromDiscriminatorValue'])),
            'elementType' => fn(ParseNode $n) => $o->setElementType($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('elements', $this->getElements());
        $writer->writeStringValue('elementType', $this->getElementType());
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
     * Sets the elements property value. The elements property
     * @param array<PackageElement>|null $value Value to set for the elements property.
    */
    public function setElements(?array $value): void {
        $this->elements = $value;
    }

    /**
     * Sets the elementType property value. The elementType property
     * @param string|null $value Value to set for the elementType property.
    */
    public function setElementType(?string $value): void {
        $this->elementType = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
