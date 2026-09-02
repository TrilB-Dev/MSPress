<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Contains properties of the possible iOS device types the mobile app can run on.
*/
class IosDeviceType implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $iPad Whether the app should run on iPads.
    */
    private ?bool $iPad = null;
    
    /**
     * @var bool|null $iPhoneAndIPod Whether the app should run on iPhones and iPods.
    */
    private ?bool $iPhoneAndIPod = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new IosDeviceType and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IosDeviceType
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IosDeviceType {
        return new IosDeviceType();
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
            'iPad' => fn(ParseNode $n) => $o->setIPad($n->getBooleanValue()),
            'iPhoneAndIPod' => fn(ParseNode $n) => $o->setIPhoneAndIPod($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the iPad property value. Whether the app should run on iPads.
     * @return bool|null
    */
    public function getIPad(): ?bool {
        return $this->iPad;
    }

    /**
     * Gets the iPhoneAndIPod property value. Whether the app should run on iPhones and iPods.
     * @return bool|null
    */
    public function getIPhoneAndIPod(): ?bool {
        return $this->iPhoneAndIPod;
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
        $writer->writeBooleanValue('iPad', $this->getIPad());
        $writer->writeBooleanValue('iPhoneAndIPod', $this->getIPhoneAndIPod());
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
     * Sets the iPad property value. Whether the app should run on iPads.
     * @param bool|null $value Value to set for the iPad property.
    */
    public function setIPad(?bool $value): void {
        $this->iPad = $value;
    }

    /**
     * Sets the iPhoneAndIPod property value. Whether the app should run on iPhones and iPods.
     * @param bool|null $value Value to set for the iPhoneAndIPod property.
    */
    public function setIPhoneAndIPod(?bool $value): void {
        $this->iPhoneAndIPod = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
