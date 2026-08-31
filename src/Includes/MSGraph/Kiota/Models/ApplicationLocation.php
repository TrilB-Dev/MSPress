<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ApplicationLocation implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $dataCenter Specifies the region or physical location where the application's primary data center is hosted.
    */
    private ?string $dataCenter = null;
    
    /**
     * @var string|null $headquarters Specifies the city, country or region where the application's owning organization is headquartered.
    */
    private ?string $headquarters = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new ApplicationLocation and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApplicationLocation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApplicationLocation {
        return new ApplicationLocation();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dataCenter property value. Specifies the region or physical location where the application's primary data center is hosted.
     * @return string|null
    */
    public function getDataCenter(): ?string {
        return $this->dataCenter;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dataCenter' => fn(ParseNode $n) => $o->setDataCenter($n->getStringValue()),
            'headquarters' => fn(ParseNode $n) => $o->setHeadquarters($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the headquarters property value. Specifies the city, country or region where the application's owning organization is headquartered.
     * @return string|null
    */
    public function getHeadquarters(): ?string {
        return $this->headquarters;
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
        $writer->writeStringValue('dataCenter', $this->getDataCenter());
        $writer->writeStringValue('headquarters', $this->getHeadquarters());
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
     * Sets the dataCenter property value. Specifies the region or physical location where the application's primary data center is hosted.
     * @param string|null $value Value to set for the dataCenter property.
    */
    public function setDataCenter(?string $value): void {
        $this->dataCenter = $value;
    }

    /**
     * Sets the headquarters property value. Specifies the city, country or region where the application's owning organization is headquartered.
     * @param string|null $value Value to set for the headquarters property.
    */
    public function setHeadquarters(?string $value): void {
        $this->headquarters = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
