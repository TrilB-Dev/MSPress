<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AzureADRegistrationPolicy implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DeviceRegistrationMembership|null $allowedToRegister Determines if Microsoft Entra registered is allowed.
    */
    private ?DeviceRegistrationMembership $allowedToRegister = null;
    
    /**
     * @var bool|null $isAdminConfigurable Determines if administrators can modify this policy.
    */
    private ?bool $isAdminConfigurable = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new AzureADRegistrationPolicy and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AzureADRegistrationPolicy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AzureADRegistrationPolicy {
        return new AzureADRegistrationPolicy();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the allowedToRegister property value. Determines if Microsoft Entra registered is allowed.
     * @return DeviceRegistrationMembership|null
    */
    public function getAllowedToRegister(): ?DeviceRegistrationMembership {
        return $this->allowedToRegister;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'allowedToRegister' => fn(ParseNode $n) => $o->setAllowedToRegister($n->getObjectValue([DeviceRegistrationMembership::class, 'createFromDiscriminatorValue'])),
            'isAdminConfigurable' => fn(ParseNode $n) => $o->setIsAdminConfigurable($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isAdminConfigurable property value. Determines if administrators can modify this policy.
     * @return bool|null
    */
    public function getIsAdminConfigurable(): ?bool {
        return $this->isAdminConfigurable;
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
        $writer->writeObjectValue('allowedToRegister', $this->getAllowedToRegister());
        $writer->writeBooleanValue('isAdminConfigurable', $this->getIsAdminConfigurable());
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
     * Sets the allowedToRegister property value. Determines if Microsoft Entra registered is allowed.
     * @param DeviceRegistrationMembership|null $value Value to set for the allowedToRegister property.
    */
    public function setAllowedToRegister(?DeviceRegistrationMembership $value): void {
        $this->allowedToRegister = $value;
    }

    /**
     * Sets the isAdminConfigurable property value. Determines if administrators can modify this policy.
     * @param bool|null $value Value to set for the isAdminConfigurable property.
    */
    public function setIsAdminConfigurable(?bool $value): void {
        $this->isAdminConfigurable = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
