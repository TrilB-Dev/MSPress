<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The minimum operating system required for a macOS app.
*/
class MacOSMinimumOperatingSystem implements AdditionalDataHolder, Parsable 
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
     * @var bool|null $v10_10 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.10 or later is required to install the app. If 'False', OS X Version 10.10 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_10 = null;
    
    /**
     * @var bool|null $v10_11 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.11 or later is required to install the app. If 'False', OS X Version 10.11 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_11 = null;
    
    /**
     * @var bool|null $v10_12 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.12 or later is required to install the app. If 'False', OS X Version 10.12 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_12 = null;
    
    /**
     * @var bool|null $v10_13 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.13 or later is required to install the app. If 'False', OS X Version 10.13 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_13 = null;
    
    /**
     * @var bool|null $v10_14 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.14 or later is required to install the app. If 'False', OS X Version 10.14 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_14 = null;
    
    /**
     * @var bool|null $v10_15 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.15 or later is required to install the app. If 'False', OS X Version 10.15 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_15 = null;
    
    /**
     * @var bool|null $v10_7 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.7 or later is required to install the app. If 'False', OS X Version 10.7 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_7 = null;
    
    /**
     * @var bool|null $v10_8 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.8 or later is required to install the app. If 'False', OS X Version 10.8 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_8 = null;
    
    /**
     * @var bool|null $v10_9 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.9 or later is required to install the app. If 'False', OS X Version 10.9 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v10_9 = null;
    
    /**
     * @var bool|null $v11_0 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 11.0 or later is required to install the app. If 'False', OS X Version 11.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v11_0 = null;
    
    /**
     * @var bool|null $v12_0 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 12.0 or later is required to install the app. If 'False', OS X Version 12.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v12_0 = null;
    
    /**
     * @var bool|null $v13_0 Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 13.0 or later is required to install the app. If 'False', OS X Version 13.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
    */
    private ?bool $v13_0 = null;
    
    /**
     * Instantiates a new MacOSMinimumOperatingSystem and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MacOSMinimumOperatingSystem
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MacOSMinimumOperatingSystem {
        return new MacOSMinimumOperatingSystem();
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
            'v10_10' => fn(ParseNode $n) => $o->setV1010($n->getBooleanValue()),
            'v10_11' => fn(ParseNode $n) => $o->setV1011($n->getBooleanValue()),
            'v10_12' => fn(ParseNode $n) => $o->setV1012($n->getBooleanValue()),
            'v10_13' => fn(ParseNode $n) => $o->setV1013($n->getBooleanValue()),
            'v10_14' => fn(ParseNode $n) => $o->setV1014($n->getBooleanValue()),
            'v10_15' => fn(ParseNode $n) => $o->setV1015($n->getBooleanValue()),
            'v10_7' => fn(ParseNode $n) => $o->setV107($n->getBooleanValue()),
            'v10_8' => fn(ParseNode $n) => $o->setV108($n->getBooleanValue()),
            'v10_9' => fn(ParseNode $n) => $o->setV109($n->getBooleanValue()),
            'v11_0' => fn(ParseNode $n) => $o->setV110($n->getBooleanValue()),
            'v12_0' => fn(ParseNode $n) => $o->setV120($n->getBooleanValue()),
            'v13_0' => fn(ParseNode $n) => $o->setV130($n->getBooleanValue()),
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
     * Gets the v10_10 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.10 or later is required to install the app. If 'False', OS X Version 10.10 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV1010(): ?bool {
        return $this->v10_10;
    }

    /**
     * Gets the v10_11 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.11 or later is required to install the app. If 'False', OS X Version 10.11 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV1011(): ?bool {
        return $this->v10_11;
    }

    /**
     * Gets the v10_12 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.12 or later is required to install the app. If 'False', OS X Version 10.12 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV1012(): ?bool {
        return $this->v10_12;
    }

    /**
     * Gets the v10_13 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.13 or later is required to install the app. If 'False', OS X Version 10.13 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV1013(): ?bool {
        return $this->v10_13;
    }

    /**
     * Gets the v10_14 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.14 or later is required to install the app. If 'False', OS X Version 10.14 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV1014(): ?bool {
        return $this->v10_14;
    }

    /**
     * Gets the v10_15 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.15 or later is required to install the app. If 'False', OS X Version 10.15 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV1015(): ?bool {
        return $this->v10_15;
    }

    /**
     * Gets the v10_7 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.7 or later is required to install the app. If 'False', OS X Version 10.7 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV107(): ?bool {
        return $this->v10_7;
    }

    /**
     * Gets the v10_8 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.8 or later is required to install the app. If 'False', OS X Version 10.8 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV108(): ?bool {
        return $this->v10_8;
    }

    /**
     * Gets the v10_9 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.9 or later is required to install the app. If 'False', OS X Version 10.9 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV109(): ?bool {
        return $this->v10_9;
    }

    /**
     * Gets the v11_0 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 11.0 or later is required to install the app. If 'False', OS X Version 11.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV110(): ?bool {
        return $this->v11_0;
    }

    /**
     * Gets the v12_0 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 12.0 or later is required to install the app. If 'False', OS X Version 12.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV120(): ?bool {
        return $this->v12_0;
    }

    /**
     * Gets the v13_0 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 13.0 or later is required to install the app. If 'False', OS X Version 13.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @return bool|null
    */
    public function getV130(): ?bool {
        return $this->v13_0;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeBooleanValue('v10_10', $this->getV1010());
        $writer->writeBooleanValue('v10_11', $this->getV1011());
        $writer->writeBooleanValue('v10_12', $this->getV1012());
        $writer->writeBooleanValue('v10_13', $this->getV1013());
        $writer->writeBooleanValue('v10_14', $this->getV1014());
        $writer->writeBooleanValue('v10_15', $this->getV1015());
        $writer->writeBooleanValue('v10_7', $this->getV107());
        $writer->writeBooleanValue('v10_8', $this->getV108());
        $writer->writeBooleanValue('v10_9', $this->getV109());
        $writer->writeBooleanValue('v11_0', $this->getV110());
        $writer->writeBooleanValue('v12_0', $this->getV120());
        $writer->writeBooleanValue('v13_0', $this->getV130());
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
     * Sets the v10_10 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.10 or later is required to install the app. If 'False', OS X Version 10.10 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_10 property.
    */
    public function setV1010(?bool $value): void {
        $this->v10_10 = $value;
    }

    /**
     * Sets the v10_11 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.11 or later is required to install the app. If 'False', OS X Version 10.11 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_11 property.
    */
    public function setV1011(?bool $value): void {
        $this->v10_11 = $value;
    }

    /**
     * Sets the v10_12 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.12 or later is required to install the app. If 'False', OS X Version 10.12 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_12 property.
    */
    public function setV1012(?bool $value): void {
        $this->v10_12 = $value;
    }

    /**
     * Sets the v10_13 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.13 or later is required to install the app. If 'False', OS X Version 10.13 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_13 property.
    */
    public function setV1013(?bool $value): void {
        $this->v10_13 = $value;
    }

    /**
     * Sets the v10_14 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.14 or later is required to install the app. If 'False', OS X Version 10.14 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_14 property.
    */
    public function setV1014(?bool $value): void {
        $this->v10_14 = $value;
    }

    /**
     * Sets the v10_15 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.15 or later is required to install the app. If 'False', OS X Version 10.15 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_15 property.
    */
    public function setV1015(?bool $value): void {
        $this->v10_15 = $value;
    }

    /**
     * Sets the v10_7 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.7 or later is required to install the app. If 'False', OS X Version 10.7 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_7 property.
    */
    public function setV107(?bool $value): void {
        $this->v10_7 = $value;
    }

    /**
     * Sets the v10_8 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.8 or later is required to install the app. If 'False', OS X Version 10.8 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_8 property.
    */
    public function setV108(?bool $value): void {
        $this->v10_8 = $value;
    }

    /**
     * Sets the v10_9 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 10.9 or later is required to install the app. If 'False', OS X Version 10.9 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v10_9 property.
    */
    public function setV109(?bool $value): void {
        $this->v10_9 = $value;
    }

    /**
     * Sets the v11_0 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 11.0 or later is required to install the app. If 'False', OS X Version 11.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v11_0 property.
    */
    public function setV110(?bool $value): void {
        $this->v11_0 = $value;
    }

    /**
     * Sets the v12_0 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 12.0 or later is required to install the app. If 'False', OS X Version 12.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v12_0 property.
    */
    public function setV120(?bool $value): void {
        $this->v12_0 = $value;
    }

    /**
     * Sets the v13_0 property value. Indicates the minimum OS X version support required for the managed device. When 'True', macOS with OS X 13.0 or later is required to install the app. If 'False', OS X Version 13.0 is not the minimum version. Default value is False. Exactly one of the minimum operating system boolean values will be TRUE.
     * @param bool|null $value Value to set for the v13_0 property.
    */
    public function setV130(?bool $value): void {
        $this->v13_0 = $value;
    }

}
