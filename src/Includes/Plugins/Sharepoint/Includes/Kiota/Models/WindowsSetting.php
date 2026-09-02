<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WindowsSetting extends Entity implements Parsable 
{
    /**
     * @var array<WindowsSettingInstance>|null $instances A collection of setting values for a given windowsSetting.
    */
    private ?array $instances = null;
    
    /**
     * @var string|null $payloadType The type of setting payloads contained in the instances navigation property.
    */
    private ?string $payloadType = null;
    
    /**
     * @var WindowsSettingType|null $settingType The settingType property
    */
    private ?WindowsSettingType $settingType = null;
    
    /**
     * @var string|null $windowsDeviceId A unique identifier for the device the setting might belong to if it is of the settingType backup.
    */
    private ?string $windowsDeviceId = null;
    
    /**
     * Instantiates a new WindowsSetting and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WindowsSetting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WindowsSetting {
        return new WindowsSetting();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'instances' => fn(ParseNode $n) => $o->setInstances($n->getCollectionOfObjectValues([WindowsSettingInstance::class, 'createFromDiscriminatorValue'])),
            'payloadType' => fn(ParseNode $n) => $o->setPayloadType($n->getStringValue()),
            'settingType' => fn(ParseNode $n) => $o->setSettingType($n->getEnumValue(WindowsSettingType::class)),
            'windowsDeviceId' => fn(ParseNode $n) => $o->setWindowsDeviceId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the instances property value. A collection of setting values for a given windowsSetting.
     * @return array<WindowsSettingInstance>|null
    */
    public function getInstances(): ?array {
        return $this->instances;
    }

    /**
     * Gets the payloadType property value. The type of setting payloads contained in the instances navigation property.
     * @return string|null
    */
    public function getPayloadType(): ?string {
        return $this->payloadType;
    }

    /**
     * Gets the settingType property value. The settingType property
     * @return WindowsSettingType|null
    */
    public function getSettingType(): ?WindowsSettingType {
        return $this->settingType;
    }

    /**
     * Gets the windowsDeviceId property value. A unique identifier for the device the setting might belong to if it is of the settingType backup.
     * @return string|null
    */
    public function getWindowsDeviceId(): ?string {
        return $this->windowsDeviceId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('instances', $this->getInstances());
        $writer->writeStringValue('payloadType', $this->getPayloadType());
        $writer->writeEnumValue('settingType', $this->getSettingType());
        $writer->writeStringValue('windowsDeviceId', $this->getWindowsDeviceId());
    }

    /**
     * Sets the instances property value. A collection of setting values for a given windowsSetting.
     * @param array<WindowsSettingInstance>|null $value Value to set for the instances property.
    */
    public function setInstances(?array $value): void {
        $this->instances = $value;
    }

    /**
     * Sets the payloadType property value. The type of setting payloads contained in the instances navigation property.
     * @param string|null $value Value to set for the payloadType property.
    */
    public function setPayloadType(?string $value): void {
        $this->payloadType = $value;
    }

    /**
     * Sets the settingType property value. The settingType property
     * @param WindowsSettingType|null $value Value to set for the settingType property.
    */
    public function setSettingType(?WindowsSettingType $value): void {
        $this->settingType = $value;
    }

    /**
     * Sets the windowsDeviceId property value. A unique identifier for the device the setting might belong to if it is of the settingType backup.
     * @param string|null $value Value to set for the windowsDeviceId property.
    */
    public function setWindowsDeviceId(?string $value): void {
        $this->windowsDeviceId = $value;
    }

}
