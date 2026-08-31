<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UserWorkLocation implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $placeId Identifier of the place, if applicable.
    */
    private ?string $placeId = null;
    
    /**
     * @var WorkLocationSource|null $source The source property
    */
    private ?WorkLocationSource $source = null;
    
    /**
     * @var WorkLocationType|null $workLocationType The workLocationType property
    */
    private ?WorkLocationType $workLocationType = null;
    
    /**
     * Instantiates a new UserWorkLocation and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UserWorkLocation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UserWorkLocation {
        return new UserWorkLocation();
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
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'placeId' => fn(ParseNode $n) => $o->setPlaceId($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(WorkLocationSource::class)),
            'workLocationType' => fn(ParseNode $n) => $o->setWorkLocationType($n->getEnumValue(WorkLocationType::class)),
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
     * Gets the placeId property value. Identifier of the place, if applicable.
     * @return string|null
    */
    public function getPlaceId(): ?string {
        return $this->placeId;
    }

    /**
     * Gets the source property value. The source property
     * @return WorkLocationSource|null
    */
    public function getSource(): ?WorkLocationSource {
        return $this->source;
    }

    /**
     * Gets the workLocationType property value. The workLocationType property
     * @return WorkLocationType|null
    */
    public function getWorkLocationType(): ?WorkLocationType {
        return $this->workLocationType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('placeId', $this->getPlaceId());
        $writer->writeEnumValue('source', $this->getSource());
        $writer->writeEnumValue('workLocationType', $this->getWorkLocationType());
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
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the placeId property value. Identifier of the place, if applicable.
     * @param string|null $value Value to set for the placeId property.
    */
    public function setPlaceId(?string $value): void {
        $this->placeId = $value;
    }

    /**
     * Sets the source property value. The source property
     * @param WorkLocationSource|null $value Value to set for the source property.
    */
    public function setSource(?WorkLocationSource $value): void {
        $this->source = $value;
    }

    /**
     * Sets the workLocationType property value. The workLocationType property
     * @param WorkLocationType|null $value Value to set for the workLocationType property.
    */
    public function setWorkLocationType(?WorkLocationType $value): void {
        $this->workLocationType = $value;
    }

}
