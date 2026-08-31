<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The minimum operating system required for a Windows mobile app.
*/
class WindowsMinimumOperatingSystem implements AdditionalDataHolder, Parsable 
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
     * @var bool|null $v10_0 Windows version 10.0 or later.
    */
    private ?bool $v10_0 = null;
    
    /**
     * @var bool|null $v8_0 Windows version 8.0 or later.
    */
    private ?bool $v8_0 = null;
    
    /**
     * @var bool|null $v8_1 Windows version 8.1 or later.
    */
    private ?bool $v8_1 = null;
    
    /**
     * Instantiates a new WindowsMinimumOperatingSystem and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WindowsMinimumOperatingSystem
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WindowsMinimumOperatingSystem {
        return new WindowsMinimumOperatingSystem();
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
            'v10_0' => fn(ParseNode $n) => $o->setV100($n->getBooleanValue()),
            'v8_0' => fn(ParseNode $n) => $o->setV80($n->getBooleanValue()),
            'v8_1' => fn(ParseNode $n) => $o->setV81($n->getBooleanValue()),
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
     * Gets the v10_0 property value. Windows version 10.0 or later.
     * @return bool|null
    */
    public function getV100(): ?bool {
        return $this->v10_0;
    }

    /**
     * Gets the v8_0 property value. Windows version 8.0 or later.
     * @return bool|null
    */
    public function getV80(): ?bool {
        return $this->v8_0;
    }

    /**
     * Gets the v8_1 property value. Windows version 8.1 or later.
     * @return bool|null
    */
    public function getV81(): ?bool {
        return $this->v8_1;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeBooleanValue('v10_0', $this->getV100());
        $writer->writeBooleanValue('v8_0', $this->getV80());
        $writer->writeBooleanValue('v8_1', $this->getV81());
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
     * Sets the v10_0 property value. Windows version 10.0 or later.
     * @param bool|null $value Value to set for the v10_0 property.
    */
    public function setV100(?bool $value): void {
        $this->v10_0 = $value;
    }

    /**
     * Sets the v8_0 property value. Windows version 8.0 or later.
     * @param bool|null $value Value to set for the v8_0 property.
    */
    public function setV80(?bool $value): void {
        $this->v8_0 = $value;
    }

    /**
     * Sets the v8_1 property value. Windows version 8.1 or later.
     * @param bool|null $value Value to set for the v8_1 property.
    */
    public function setV81(?bool $value): void {
        $this->v8_1 = $value;
    }

}
