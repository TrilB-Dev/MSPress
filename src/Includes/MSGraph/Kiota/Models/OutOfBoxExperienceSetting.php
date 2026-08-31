<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The Windows Autopilot Deployment Profile settings used by the device for the out-of-box experience. Supports: $select, $top, $skip. $Search, $orderBy and $filter are not supported.
*/
class OutOfBoxExperienceSetting implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var WindowsDeviceUsageType|null $deviceUsageType The deviceUsageType property
    */
    private ?WindowsDeviceUsageType $deviceUsageType = null;
    
    /**
     * @var bool|null $escapeLinkHidden When TRUE, the link that allows user to start over with a different account on company sign-in is hidden. When false, the link that allows user to start over with a different account on company sign-in is available. Default value is FALSE.
    */
    private ?bool $escapeLinkHidden = null;
    
    /**
     * @var bool|null $eulaHidden When TRUE, EULA is hidden to the end user during OOBE. When FALSE, EULA is shown to the end user during OOBE. Default value is FALSE.
    */
    private ?bool $eulaHidden = null;
    
    /**
     * @var bool|null $keyboardSelectionPageSkipped When TRUE, the keyboard selection page is hidden to the end user during OOBE if Language and Region are set. When FALSE, the keyboard selection page is skipped during OOBE.
    */
    private ?bool $keyboardSelectionPageSkipped = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var bool|null $privacySettingsHidden When TRUE, privacy settings is hidden to the end user during OOBE. When FALSE, privacy settings is shown to the end user during OOBE. Default value is FALSE.
    */
    private ?bool $privacySettingsHidden = null;
    
    /**
     * @var WindowsUserType|null $userType The userType property
    */
    private ?WindowsUserType $userType = null;
    
    /**
     * Instantiates a new OutOfBoxExperienceSetting and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OutOfBoxExperienceSetting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OutOfBoxExperienceSetting {
        return new OutOfBoxExperienceSetting();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the deviceUsageType property value. The deviceUsageType property
     * @return WindowsDeviceUsageType|null
    */
    public function getDeviceUsageType(): ?WindowsDeviceUsageType {
        return $this->deviceUsageType;
    }

    /**
     * Gets the escapeLinkHidden property value. When TRUE, the link that allows user to start over with a different account on company sign-in is hidden. When false, the link that allows user to start over with a different account on company sign-in is available. Default value is FALSE.
     * @return bool|null
    */
    public function getEscapeLinkHidden(): ?bool {
        return $this->escapeLinkHidden;
    }

    /**
     * Gets the eulaHidden property value. When TRUE, EULA is hidden to the end user during OOBE. When FALSE, EULA is shown to the end user during OOBE. Default value is FALSE.
     * @return bool|null
    */
    public function getEulaHidden(): ?bool {
        return $this->eulaHidden;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'deviceUsageType' => fn(ParseNode $n) => $o->setDeviceUsageType($n->getEnumValue(WindowsDeviceUsageType::class)),
            'escapeLinkHidden' => fn(ParseNode $n) => $o->setEscapeLinkHidden($n->getBooleanValue()),
            'eulaHidden' => fn(ParseNode $n) => $o->setEulaHidden($n->getBooleanValue()),
            'keyboardSelectionPageSkipped' => fn(ParseNode $n) => $o->setKeyboardSelectionPageSkipped($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'privacySettingsHidden' => fn(ParseNode $n) => $o->setPrivacySettingsHidden($n->getBooleanValue()),
            'userType' => fn(ParseNode $n) => $o->setUserType($n->getEnumValue(WindowsUserType::class)),
        ];
    }

    /**
     * Gets the keyboardSelectionPageSkipped property value. When TRUE, the keyboard selection page is hidden to the end user during OOBE if Language and Region are set. When FALSE, the keyboard selection page is skipped during OOBE.
     * @return bool|null
    */
    public function getKeyboardSelectionPageSkipped(): ?bool {
        return $this->keyboardSelectionPageSkipped;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the privacySettingsHidden property value. When TRUE, privacy settings is hidden to the end user during OOBE. When FALSE, privacy settings is shown to the end user during OOBE. Default value is FALSE.
     * @return bool|null
    */
    public function getPrivacySettingsHidden(): ?bool {
        return $this->privacySettingsHidden;
    }

    /**
     * Gets the userType property value. The userType property
     * @return WindowsUserType|null
    */
    public function getUserType(): ?WindowsUserType {
        return $this->userType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('deviceUsageType', $this->getDeviceUsageType());
        $writer->writeBooleanValue('escapeLinkHidden', $this->getEscapeLinkHidden());
        $writer->writeBooleanValue('eulaHidden', $this->getEulaHidden());
        $writer->writeBooleanValue('keyboardSelectionPageSkipped', $this->getKeyboardSelectionPageSkipped());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeBooleanValue('privacySettingsHidden', $this->getPrivacySettingsHidden());
        $writer->writeEnumValue('userType', $this->getUserType());
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
     * Sets the deviceUsageType property value. The deviceUsageType property
     * @param WindowsDeviceUsageType|null $value Value to set for the deviceUsageType property.
    */
    public function setDeviceUsageType(?WindowsDeviceUsageType $value): void {
        $this->deviceUsageType = $value;
    }

    /**
     * Sets the escapeLinkHidden property value. When TRUE, the link that allows user to start over with a different account on company sign-in is hidden. When false, the link that allows user to start over with a different account on company sign-in is available. Default value is FALSE.
     * @param bool|null $value Value to set for the escapeLinkHidden property.
    */
    public function setEscapeLinkHidden(?bool $value): void {
        $this->escapeLinkHidden = $value;
    }

    /**
     * Sets the eulaHidden property value. When TRUE, EULA is hidden to the end user during OOBE. When FALSE, EULA is shown to the end user during OOBE. Default value is FALSE.
     * @param bool|null $value Value to set for the eulaHidden property.
    */
    public function setEulaHidden(?bool $value): void {
        $this->eulaHidden = $value;
    }

    /**
     * Sets the keyboardSelectionPageSkipped property value. When TRUE, the keyboard selection page is hidden to the end user during OOBE if Language and Region are set. When FALSE, the keyboard selection page is skipped during OOBE.
     * @param bool|null $value Value to set for the keyboardSelectionPageSkipped property.
    */
    public function setKeyboardSelectionPageSkipped(?bool $value): void {
        $this->keyboardSelectionPageSkipped = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the privacySettingsHidden property value. When TRUE, privacy settings is hidden to the end user during OOBE. When FALSE, privacy settings is shown to the end user during OOBE. Default value is FALSE.
     * @param bool|null $value Value to set for the privacySettingsHidden property.
    */
    public function setPrivacySettingsHidden(?bool $value): void {
        $this->privacySettingsHidden = $value;
    }

    /**
     * Sets the userType property value. The userType property
     * @param WindowsUserType|null $value Value to set for the userType property.
    */
    public function setUserType(?WindowsUserType $value): void {
        $this->userType = $value;
    }

}
