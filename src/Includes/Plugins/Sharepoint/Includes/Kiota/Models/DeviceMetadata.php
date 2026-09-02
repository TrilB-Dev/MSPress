<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DeviceMetadata implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $deviceType Optional. The general type of the device (for example, 'Managed', 'Unmanaged').
    */
    private ?string $deviceType = null;
    
    /**
     * @var string|null $ipAddress The Internet Protocol (IP) address of the device.
    */
    private ?string $ipAddress = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var OperatingSystemSpecifications|null $operatingSystemSpecifications Details about the operating system platform and version.
    */
    private ?OperatingSystemSpecifications $operatingSystemSpecifications = null;
    
    /**
     * Instantiates a new DeviceMetadata and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DeviceMetadata
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DeviceMetadata {
        return new DeviceMetadata();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the deviceType property value. Optional. The general type of the device (for example, 'Managed', 'Unmanaged').
     * @return string|null
    */
    public function getDeviceType(): ?string {
        return $this->deviceType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'deviceType' => fn(ParseNode $n) => $o->setDeviceType($n->getStringValue()),
            'ipAddress' => fn(ParseNode $n) => $o->setIpAddress($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'operatingSystemSpecifications' => fn(ParseNode $n) => $o->setOperatingSystemSpecifications($n->getObjectValue([OperatingSystemSpecifications::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the ipAddress property value. The Internet Protocol (IP) address of the device.
     * @return string|null
    */
    public function getIpAddress(): ?string {
        return $this->ipAddress;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the operatingSystemSpecifications property value. Details about the operating system platform and version.
     * @return OperatingSystemSpecifications|null
    */
    public function getOperatingSystemSpecifications(): ?OperatingSystemSpecifications {
        return $this->operatingSystemSpecifications;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('deviceType', $this->getDeviceType());
        $writer->writeStringValue('ipAddress', $this->getIpAddress());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('operatingSystemSpecifications', $this->getOperatingSystemSpecifications());
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
     * Sets the deviceType property value. Optional. The general type of the device (for example, 'Managed', 'Unmanaged').
     * @param string|null $value Value to set for the deviceType property.
    */
    public function setDeviceType(?string $value): void {
        $this->deviceType = $value;
    }

    /**
     * Sets the ipAddress property value. The Internet Protocol (IP) address of the device.
     * @param string|null $value Value to set for the ipAddress property.
    */
    public function setIpAddress(?string $value): void {
        $this->ipAddress = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the operatingSystemSpecifications property value. Details about the operating system platform and version.
     * @param OperatingSystemSpecifications|null $value Value to set for the operatingSystemSpecifications property.
    */
    public function setOperatingSystemSpecifications(?OperatingSystemSpecifications $value): void {
        $this->operatingSystemSpecifications = $value;
    }

}
